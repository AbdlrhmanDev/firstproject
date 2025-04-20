<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

/**
 * Controller for handling application management in the admin panel
 */
class AdminApplicationController extends Controller
{
    /**
     * Display a listing of all applications
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get all applications with their related user and job data, ordered by latest first
        $applications = Application::with(['user', 'job'])
            ->latest()
            ->get();

        return view('admin.applications.index', compact('applications'));
    }
}
