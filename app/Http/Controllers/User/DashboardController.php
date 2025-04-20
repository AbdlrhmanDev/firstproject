<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Resume;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the user dashboard with statistics and latest content.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userId = Auth::id();

        // Get user statistics
        $resumeCount = Resume::where('user_id', $userId)->count();
        $applicationCount = Application::where('user_id', $userId)->count();

        // Get latest resume
        $latestResume = Resume::where('user_id', $userId)
            ->latest()
            ->first();

        // Get recent applications with job details
        $recentApplications = Application::with('job')
            ->where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        // Get suggested jobs (currently showing latest 3 jobs)
        $suggestedJobs = Job::latest()
            ->take(3)
            ->get();

        return view('user.home', compact(
            'resumeCount',
            'applicationCount',
            'latestResume',
            'recentApplications',
            'suggestedJobs'
        ));
    }

    /**
     * Display user's submitted applications with job and employer details.
     * 
     * @return \Illuminate\View\View
     */
    public function orders()
    {
        $orders = Application::with('job.employer')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.orders', compact('orders'));
    }
}


