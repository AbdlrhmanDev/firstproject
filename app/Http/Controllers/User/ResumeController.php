<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the user's resumes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $resumes = Resume::where('user_id', Auth::id())->get();
        return view('user.resume.index', compact('resumes'));
    }

    /**
     * Show the form for creating a new resume.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.resume.create');
    }

    /**
     * Store a newly created resume in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
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

        // Create resume with authenticated user's ID
        Resume::create([
            'user_id'     => Auth::id(),
            'full_name'   => $request->full_name,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'address'     => $request->address,
            'skills'      => $request->skills,
            'experience'  => $request->experience,
            'education'   => $request->education,
            'summary'     => $request->summary,
        ]);

        // Redirect to index with success message
        return redirect()->route('user.resume.index')
            ->with('success', 'Resume created successfully!');
    }

    /**
     * Display the specified resume.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\View\View
     */
    public function show(Resume $resume)
    {
        return view('user.resume.show', compact('resume'));
    }

    /**
     * Show the form for editing the specified resume.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\View\View
     */
    public function edit(Resume $resume)
    {
        return view('user.resume.edit', compact('resume'));
    }

    /**
     * Update the specified resume in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Resume $resume)
    {
        // Validate the incoming request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone'     => 'required|string|max:20',
            'email'     => 'required|email',
            'address'   => 'nullable|string|max:255',
            'skills'    => 'nullable|string',
            'experience'=> 'nullable|string',
            'education' => 'nullable|string',
            'summary'   => 'nullable|string',
        ]);

        // Update the resume with validated data
        $resume->update($request->all());

        // Redirect to show page with success message
        return redirect()->route('user.resume.show', $resume)
            ->with('success', 'Resume updated successfully!');
    }

    /**
     * Remove the specified resume from storage.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Resume $resume)
    {
        $resume->delete();
        return redirect()->route('user.resume.index')
            ->with('success', 'Resume deleted successfully.');
    }
}
