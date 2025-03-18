<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $resumes = Resume::all(); // Fetch all resumes
    //     return view('dashboard', compact('resumes'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resume.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Store resume in the database
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'experience' => 'nullable|string',
            'education' => 'nullable|string',
            'summary' => 'nullable|string',
        ]);

        $resumeData = $request->all();
        $resumeData['user_id'] = Auth::id();

        Resume::create($resumeData);

        return redirect()->route('resume.show')->with('success', 'Resume created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $resume = Auth::user()->resume;


        return view('resume.show', compact('resume')); 
       }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $resume = Auth::user()->resume;
        return view('resume.edit', compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'experience' => 'nullable|string',
            'education' => 'nullable|string',
            'summary' => 'nullable|string',
        ]);

        $resume = Auth::user()->resume;
        $resume->update($request->all());

        return redirect()->route('resume.show')->with('success', 'Resume updated successfully!');
    }
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
