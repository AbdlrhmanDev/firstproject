<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $featuredJobs = Job::where('featured', true)->take(8)->get();

        $recentJobs = Job::with('tags')->latest()->paginate(6);


        return view('home', [
            'jobs' => $featuredJobs->first() ?? null, // Avoid indexing directly
            'featuredJobs' => $featuredJobs->slice(1)->values() ?? [], // Avoid direct index access
            'tags' => Tag::all(),
            'recentJobs' => $recentJobs,
        ]);
    }
}   
// return view('home',  [
        //     'jobs' => $featuredJobs[0],
        //     'featuredJobs' => $featuredJobs[1],
        //     'tags' => Tag::all(),
        // ]);