<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Application;




use Illuminate\Http\Request;

class JobController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */

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
    public function store(StoreJobRequest $request)
    {
     

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
    public function update(UpdateJobRequest $request, Job $job)
    {
        
        $this->authorize('update', $job);
        $job->update($request->validated());


        return redirect()->route('jobs.index',compact('job'));
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Job $job)
    // {
    //     $job->delete();
    //     return redirect()->route('jobs.index');
    // }
    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
    public function apply(Request $request, Job $job)
    {
        // تحقق من أن المستخدم مسجل دخول
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول قبل التقديم على الوظيفة.');
        }

        // التحقق من البيانات
        $request->validate([
            'message' => 'nullable|string|max:1000',
        ]);

        // إنشاء طلب التقديم
        Application::create([
            'user_id' => auth()->id(),
            'job_id' => $job->id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'تم تقديم طلبك بنجاح!');
    }
}
