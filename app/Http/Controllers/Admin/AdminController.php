<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Application;
use App\Models\Employer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard with cached statistics
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stats = Cache::remember('admin_dashboard_stats', now(), function () {
            return [
                'totalJobs' => Job::count(),
                'totalApplications' => Application::count(),
                'totalUsers' => User::count(),
                'totalEmployers' => Employer::count(),
            ];
        });

        return view('admin.home', $stats);
    }

    /**
     * Display all jobs in the admin panel
     * 
     * @param Job $job
     * @return \Illuminate\View\View
     */
    public function show(Job $job)
    {
        $jobs = Job::all();
        return view('admin.jobs', compact('jobs'));
    }

    /**
     * Display detailed dashboard overview with various statistics
     * Includes user counts, job statistics, application metrics, and recent activities
     * 
     * @return \Illuminate\View\View
     */
    public function dashboardOverview()
    {
        // User Statistics
        $totalUsers = User::where('role', 'user')->count();
        $totalEmployers = User::where('role', 'employer')->count();
        
        // Job Statistics
        $totalJobs = Job::count();
        $pendingJobs = Job::whereNull('status')
            ->orWhere('status', 'pending')
            ->count();
        
        // Application Statistics
        $totalApplications = Application::count();
        $acceptedApplications = Application::where('status', 'Accepted')->count();
        $acceptanceRate = $totalApplications > 0
            ? round(($acceptedApplications / $totalApplications) * 100, 1)
            : 0;

        // Most Popular Job
        $mostAppliedJob = Job::withCount('applications')
            ->orderByDesc('applications_count')
            ->first();

        // Recent Activities
        $recentUsers = User::latest()->take(5)->get();
        $recentJobs = Job::with('company')->latest()->take(5)->get();
        $recentApplications = Application::with(['user', 'job'])->latest()->take(5)->get();

        return view('admin.home', compact(
            'totalJobs',
            'totalUsers',
            'totalEmployers',
            'totalApplications',
            'acceptedApplications',
            'acceptanceRate',
            'pendingJobs',
            'mostAppliedJob',
            'recentUsers',
            'recentJobs',
            'recentApplications'
        ));
    }
}
