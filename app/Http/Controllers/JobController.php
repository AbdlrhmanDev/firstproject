<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;




use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     // Get filter inputs
    //     $search = $request->input('search');
    //     $minSalary = $request->input('min_salary');
    //     $maxSalary = $request->input('max_salary');
    //     $company_id = $request->input('company_id');
    //     $is_featured = $request->input('featured');

    //     // Query with scopes
    //     $jobs = Job::search($search)
    //         ->salaryRange($minSalary, $maxSalary)
    //         ->company($company_id)
    //         ->featured($is_featured)
    //         ->paginate(10); // Paginate results

    //     return view('jobs.index', compact('jobs'));
   
    //     $jobs = Job::all();
    //      return view('jobs.index', compact('jobs'));
    // }
    public function index(Request $request)
    {
        // Validate the inputs
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:0|gte:min_salary',
            'company_id' => 'nullable|integer|exists:companies,id',
            'featured' => 'nullable|boolean',
        ]);

        // Extract values with defaults
        $search = $validated['search'] ?? null;
        $minSalary = $validated['min_salary'] ?? null;
        $maxSalary = $validated['max_salary'] ?? null;
        $companyId = $validated['company_id'] ?? null;
        // Fix: Safely handle the 'featured' key
        $isFeatured = isset($validated['featured'])
            ? filter_var($validated['featured'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)
            : null;
        // Build the query dynamically using when
        $jobs = Job::query()
            ->when($search, fn($query) => $query->search($search))
            ->when($minSalary !== null && $maxSalary !== null, fn($query) => $query->salaryRange($minSalary, $maxSalary))
            ->when($companyId, fn($query) => $query->company($companyId))
            ->when(!is_null($isFeatured), fn($query) => $query->featured($isFeatured))
            ->orderBy('created_at', 'desc') // Order results by creation date
            ->paginate(10)
            ->appends($request->query()); // Preserve filter parameters in pagination links

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required|numeric',
        ]);

        // Get the authenticated employer's company_id
        $companyId = optional(Auth::user()->employers)->id;

        if (!$companyId) {
            return redirect()->back()->with('error', 'You must be an employer to post a job.');
        }

        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'company_id' => $companyId,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
        // Job::create($request->all());
        // return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $job->update($request->all());
        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }
}
