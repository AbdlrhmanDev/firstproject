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
    public function index()
    {
        $stats = Cache::remember('admin_dashboard_stats', now(),function () {
            return [
                'totalJobs' => Job::count(),
                'totalApplications' => Application::count(),
                'totalUsers' => User::count(),
                'totalEmployers' => Employer::count(),
            ];
        });

        return view('admin.home', $stats);
    }
    // public function dashboard()
    // {
    //     return view('admin');
    //     // return $this->index();
    // }
    public function show(Job $job)

    {
       $jobs = Job::all();
        return view('admin.jobs', compact('jobs'));
    }
    public function dashboardOverview()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalEmployers = User::where('role', 'employer')->count();
        $totalJobs = Job::count();
        $totalApplications = Application::count();

        $acceptedApplications = Application::where('status', 'Accepted')->count();
        $acceptanceRate = $totalApplications > 0
            ? round(($acceptedApplications / $totalApplications) * 100, 1)
            : 0;

        $pendingJobs = Job::whereNull('status')->orWhere('status', 'pending')->count();

        $mostAppliedJob = Job::withCount('applications')
            ->orderByDesc('applications_count')
            ->first();

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
