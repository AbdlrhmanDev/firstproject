<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Application;
class AdminApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with('user', 'job')->latest()->get();
        return view('admin.applications.index', compact('applications'));
    }
}
