<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EmployerJobController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the jobs for the authenticated employer's company.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companyId = optional(Auth::user()->company)->id;

        if (!$companyId) {
            return redirect()->back()->with('error', 'No associated company found.');
        }

        $jobs = Job::where('company_id', $companyId)
            ->latest()
            ->paginate(10);
        
        return view('employer.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new job.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('employer.job.create');
    }

    /**
     * Store a newly created job in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreJobRequest $request)
    {
        $companyId = optional(Auth::user()->company)->id;

        if (!$companyId) {
            return redirect()->back()->with('error', 'You must have a company to post a job.');
        }

        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'company_id' => $companyId,
            'featured' => $request->featured ?? false
        ]);

        return redirect()
            ->route('employer.job.index')
            ->with('success', 'Job posted successfully.');
    }

    /**
     * Show the form for editing the specified job.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\View\View
     */
    public function edit(Job $job)
    {
        $this->authorize('update', $job);
        return view('employer.job.edit', compact('job'));
    }

    /**
     * Update the specified job in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequest  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $this->authorize('update', $job);
        $job->update($request->validated());

        return redirect()
            ->route('employer.job.index')
            ->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified job from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);
        $job->delete();

        return redirect()
            ->route('employer.job.index')
            ->with('success', 'Job deleted successfully.');
    }
}