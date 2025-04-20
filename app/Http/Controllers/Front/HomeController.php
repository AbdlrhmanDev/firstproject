<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Statistics;
use App\Models\Job;
use App\Models\Tag;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * HomeController handles the main landing page functionality
 * 
 * This controller is responsible for displaying featured jobs,
 * recent job listings, and tags on the home page.
 */
class HomeController extends Controller
{
    /**
     * Display the home page with featured and recent jobs
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Cache statistics for 1 hour to improve performance
        $statistics = Cache::remember('home_statistics', 3600, function () {
            return [
                'active_jobs' => Job::where('status', 'active')->count(),
                'companies' => Company::count(),
                'job_seekers' => User::where('role', 'user')->count(),
                'jobs_filled' => Job::where('status', 'filled')->count()
            ];
        });

        // Get featured jobs with their related tags and company information
        $featuredJobs = Job::with('tags', 'company') 
            ->where('featured', true)
            ->take(12)
            ->get();

        // Get recent job listings with their related tags and company information
        $recentJobs = Job::with('tags', 'company')
            ->latest()
            ->take(12)
            ->get();

        // Return the home view with the necessary data
        return view('home', [
            'featuredJobs' => $featuredJobs,      // All featured jobs
            'tags' => Tag::all(),                 // All available tags
            'recentJobs' => $recentJobs,          // Recent job listings
            'statistics' => $statistics,
        ]);
    }
}   
// return view('home',  [
        //     'jobs' => $featuredJobs[0],
        //     'featuredJobs' => $featuredJobs[1],
        //     'tags' => Tag::all(),
        // ]);