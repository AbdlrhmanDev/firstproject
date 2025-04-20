<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    /**
     * Display a listing of all job applications for the employer's company
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $company = Auth::user()->company;
        $orders = collect(); // Initialize empty collection as default

        if ($company) {
            $orders = Application::with(['user', 'job'])
                ->whereHas('job', function ($query) use ($company) {
                    $query->where('company_id', $company->id);
                })
                ->get();
        }

        return view('employer.orders', compact('orders'));
    }

    /**
     * Display the employer's dashboard with key metrics and statistics
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function dashboardHome()
    {
        $company = Auth::user()->company;

        // Check if user has an associated company
        if (!$company) {
            return redirect()->back()->with('error', 'No associated company.');
        }

        // Get all job IDs for the company
        $jobIds = $company->jobs()->pluck('id');

        // Calculate basic statistics
        $totalJobs = $company->jobs()->count();
        $totalApplications = Application::whereIn('job_id', $jobIds)->count();
        $featuredJobs = $company->jobs()->where('featured', true)->count();
        $latestJob = $company->jobs()->latest()->first();

        // Calculate application status counts
        $acceptedCount = Application::whereIn('job_id', $jobIds)->where('status', 'Accepted')->count();
        $pendingCount = Application::whereIn('job_id', $jobIds)->where('status', 'Pending')->count();
        $rejectedCount = Application::whereIn('job_id', $jobIds)->where('status', 'Rejected')->count();

        // Calculate acceptance rate
        $acceptanceRate = $totalApplications > 0 
            ? round(($acceptedCount / $totalApplications) * 100, 1) 
            : 0;

        // Get most applied job
        $mostAppliedJob = Job::withCount('applications')
            ->where('company_id', $company->id)
            ->orderByDesc('applications_count')
            ->first();

        // Get recent applications
        $recentApplications = Application::with(['user', 'job'])
            ->whereIn('job_id', $jobIds)
            ->latest()
            ->take(5)
            ->get();

        return view('employer.home', compact(
            'totalJobs',
            'totalApplications',
            'featuredJobs',
            'latestJob',
            'acceptedCount',
            'pendingCount',
            'rejectedCount',
            'acceptanceRate',
            'mostAppliedJob',
            'recentApplications'
        ));
    }

    /**
     * Update the status of a job application
     *
     * @param Request $request
     * @param Application $application
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, Application $application)
    {
        // Check if user is authorized to update applications
        if (!Auth::user()->isEmployer()) {
            return redirect()->back()->with('error', 'You are not authorized to update applications.');
        }

        // Validate the status update request
        $request->validate([
            'status' => 'required|in:Pending,Accepted,Rejected',
        ]);

        // Update the application status
        $application->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }
}
