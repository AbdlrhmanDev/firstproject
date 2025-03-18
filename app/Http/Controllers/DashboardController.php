<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Resume;

class DashboardController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->paginate(10); // Fetch latest jobs with pagination
        $resumes = Resume::all(); // Fetch all resumes
        return view('dashboard', compact('jobs','resumes'));
    }
}


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class DashboardController extends Controller
// {
//     /**
//      * Display the appropriate dashboard based on user role.
//      */
//     public function index()
//     {
//         $user = Auth::user();

//         // Redirect users to their respective dashboards
//         return match ($user->role) {
//             'admin' => redirect()->route('admin.dashboard'),
//             'employer' => redirect()->route('employer.dashboard'),
//             'user' => redirect()->route('user.dashboard'),
//             default => redirect('/'),
//         };
//     }

//     /**
//      * Show the User Dashboard.
//      */
//     public function userDashboard()
//     {
//         return view('user.dashboard');
//     }

//     /**
//      * Show the Admin Dashboard.
//      */
//     public function adminDashboard()
//     {
//         return view('admin.dashboard');
//     }

//     /**
//      * Show the Employer Dashboard.
//      */
//     public function employerDashboard()
//     {
//         return view('employer.dashboard');
//     }

