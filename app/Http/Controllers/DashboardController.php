<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class DashboardController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->paginate(10); // Fetch latest jobs with pagination
        return view('dashboard', compact('jobs'));
    }
}
