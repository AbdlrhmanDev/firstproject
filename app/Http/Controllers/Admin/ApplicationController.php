<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use App\Models\User;

class ApplicationController extends Controller
{
    public function store(Request $request, Job $job)
    {
        $request->validate([
            'message' => 'nullable|string',
            'resume_id' => 'nullable|exists:c_v_s,id'
        ]);

        // تحقق إذا كان قدم سابقًا
        if ($job->applications()->where('user_id', auth()->id())->exists()) {
            return back()->with('error', 'لقد قدمت على هذه الوظيفة بالفعل.');
        }

        Application::create([
            'user_id' => auth()->id(),
            'job_id' => $job->id,
            'resume_id' => $request->resume_id,
            'message' => $request->message,
        ]);

        return back()->with('success', 'تم التقديم بنجاح.');
    }
}
