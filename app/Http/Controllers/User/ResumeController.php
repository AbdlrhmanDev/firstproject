<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;


use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resumes = Resume::where('user_id', Auth::id())->get();
        return view('user.resume.index', compact('resumes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.resume.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Store resume in the database
    public function store(Request $request)
    {
        $request->validate([
            'full_name'    => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'email'        => 'required|email',
            'address'      => 'nullable|string|max:255',
            'skills'       => 'nullable|string',
            'experience'   => 'nullable|string',
            'education'    => 'nullable|string',
            'summary'      => 'nullable|string',
        ]);

        // Add user ID to the validated data
        $resumeData = $request->all();
        $resumeData['user_id'] = Auth::id();

        // Store the resume in the database
        Resume::create($resumeData);

        // Fetch all resumes for the authenticated user
        $resumes = Resume::where('user_id', Auth::id())->get();

        // Return to the index view with the user's resumes
        return view('user.resume.index', compact('resumes'))
            ->with('success', 'Resume created successfully!');
    }


    /**
     * Display the specified resource.
     */
    // ResumeController.php

    public function show(Resume $resume)
    {
        return view('user.resume.show', compact('resume'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resume $resume)
    {
        return view('user.resume.edit', compact('resume'));
    }


    /**
     * Update the specified resource in storage.
     */
  
    public function update(Request $request, Resume $resume)
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

        $resume->update($request->all());

        return redirect()->route('user.resume.show', $resume)->with('success', 'Resume updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {
        $resume->delete();
        return redirect()->route('user.resume.index')->with('success', 'Resume deleted successfully.');
    }
}
