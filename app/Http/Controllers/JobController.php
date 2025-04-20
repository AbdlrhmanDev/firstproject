<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of jobs with optional search and filtering.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Clean and process URL parameters
        $allParams = $request->query();

        // Replace spaces with underscores in search parameter
        if (isset($allParams['search'])) {
            $allParams['search'] = str_replace(' ', '_', $allParams['search']);
        }

        // Remove empty parameters
        $cleanParams = array_filter($allParams, function ($value) {
            return trim($value) !== '';
        });

        // Redirect if parameters were cleaned
        if ($request->query() != $cleanParams) {
            return redirect()->route('jobs.index', $cleanParams);
        }

        // Build the job query
        $jobs = Job::query();

        // Apply search filter if provided
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $words = array_filter(explode('_', $searchTerm));
            
            foreach ($words as $word) {
                $jobs->where(function ($query) use ($word) {
                    $query->where('title', 'LIKE', "%{$word}%")
                          ->orWhere('description', 'LIKE', "%{$word}%");
                });
            }
        }

        // Get paginated results
        $jobs = $jobs->orderBy('created_at', 'desc')->paginate(10);

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new job.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = \App\Models\Tag::all();
        return view('jobs.create', compact('tags'));
    }

    /**
     * Store a newly created job in storage.
     *
     * @param StoreJobRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreJobRequest $request)
    {
        // Get the authenticated employer's company_id
        $companyId = optional(Auth::user()->employers)->id;

        if (!$companyId) {
            return redirect()->back()->with('error', 'You must be an employer to post a job.');
        }

        // Create the job
        $job = Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'company_id' => $companyId,
        ]);

        // Attach tags if provided
        if ($request->has('tags')) {
            $job->tags()->attach($request->tags);
        }

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified job.
     *
     * @param Job $job
     * @return \Illuminate\View\View
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified job.
     *
     * @param Job $job
     * @return \Illuminate\View\View
     */
    public function edit(Job $job)
    {
        $tags = \App\Models\Tag::all();
        return view('jobs.edit', compact('job', 'tags'));
    }

    /**
     * Update the specified job in storage.
     *
     * @param UpdateJobRequest $request
     * @param Job $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $this->authorize('update', $job);
        
        // Update job details
        $job->update($request->validated());
        
        // Sync tags
        if ($request->has('tags')) {
            $job->tags()->sync($request->tags);
        } else {
            $job->tags()->detach();
        }

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified job from storage.
     *
     * @param Job $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }

    /**
     * Apply for a job.
     *
     * @param Request $request
     * @param Job $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apply(Request $request, Job $job)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to apply for a job.');
        }

        // Validate the application message
        $request->validate([
            'message' => 'nullable|string|max:1000',
        ]);

        // Create the application
        Application::create([
            'user_id' => auth()->id(),
            'job_id' => $job->id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'تم تقديم طلبك بنجاح!');
    }

    /**
     * Handle AJAX search requests for Select2 job title autocomplete.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        // Get the search term from the request
        $term = $request->input('q', '');

        // Return empty response if search term is too short
        if (strlen($term) < 2) {
            return response()->json([]);
        }

        // Query jobs matching the search term
        $jobs = Job::where('title', 'LIKE', "%{$term}%")
            ->select('title', 'id') // Include ID for better Select2 integration
            ->distinct()
            ->orderBy('title')
            ->limit(10)
            ->get()
            ->map(function($job) {
                return [
                    'id' => $job->title, // Use title as ID for form submission
                    'text' => $job->title // Display text in dropdown
                ];
            });
        
        return response()->json($jobs);
    }
}
