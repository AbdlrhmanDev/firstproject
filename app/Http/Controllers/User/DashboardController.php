<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Resume;
use App\Models\Application;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;






class DashboardController extends Controller
{
    // public function index()
    // {
    //     $jobs = Job::latest()->paginate(10); // Fetch latest jobs with pagination
    //     $resumes = Resume::all(); // Fetch all resumes
    //     return view('dashboard', compact('jobs','resumes'));
    // }
    public function index()
    {
        $userId = Auth::id();

        $resumeCount = Resume::where('user_id', $userId)->count();
        $jobs = Job::latest()->paginate(10); // Fetch latest jobs with pagination
        $applicationCount = Application::where('user_id', $userId)->count();
        $suggestedJobs = Job::latest()->take(3)->get();

        $latestResume = Resume::where('user_id', $userId)->latest()->first();
        $recentApplications = Application::with('job')
            ->where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('user.home', compact('resumeCount', 'jobs', 'latestResume', 'recentApplications', 'applicationCount', 'suggestedJobs'));
    }
     public function orders()
    {
        $orders = Application::where('user_id', auth()->id())->get();
        return view('user.orders', compact('orders'));
    }
}

