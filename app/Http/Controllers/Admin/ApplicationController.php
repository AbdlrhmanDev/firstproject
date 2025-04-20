<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use App\Models\User;

class ApplicationController extends Controller
{
    /**
     * Store a new job application
     *
     * @param Request $request
     * @param Job $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Job $job)
    {
        // Validate the incoming request data
        $request->validate([
            'message' => 'nullable|string',
            'resume_id' => 'nullable|exists:c_v_s,id'
        ]);

        // Check if user has already applied for this job
        if ($job->applications()->where('user_id', auth()->id())->exists()) {
            return back()->with('error', 'لقد قدمت على هذه الوظيفة بالفعل.');
        }

        // Create new application
        Application::create([
            'user_id' => auth()->id(),
            'job_id' => $job->id,
            'resume_id' => $request->resume_id,
            'message' => $request->message,
        ]);

        // Redirect back with success message
        return back()->with('success', 'تم التقديم بنجاح.');
    }
}
