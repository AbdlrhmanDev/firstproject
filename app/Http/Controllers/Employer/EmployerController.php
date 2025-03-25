<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;



use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployerController extends Controller
{
    public function index()
    {
        $company = auth()->user()->company; // assuming relationship is defined
        $orders = collect(); // default empty collection

        if ($company) {
            $orders = Application::with('user', 'job')
                ->whereHas('job', function ($query) use ($company) {
                    $query->where('company_id', $company->id);
                })
                ->get();
        }

        return view('employer.orders', compact('orders'));
        
    }


    // public function dashboard()
    // {
    //     return view('employer.dashboard');
       
    // }
    // public function dashboardHome(){
    //     $company = auth()->user()->company;

    //     if (!$company) {
    //         return redirect()->back()->with('error', 'No associated company.');
    //     }

    //     $totalJobs = $company->jobs()->count();
    //     $totalApplications = \App\Models\Application::whereIn('job_id', $company->jobs()->pluck('id'))->count();
    //     $featuredJobs = $company->jobs()->where('featured', true)->count();

    //     $latestJob = $company->jobs()->latest()->first();

    //     return view('employer.home', compact(
    //         'totalJobs',
    //         'totalApplications',
    //         'featuredJobs',
    //         'latestJob'
    //     ));

    // }
    public function dashboardHome()
    {
        $company = auth()->user()->company;

        if (!$company) {
            return redirect()->back()->with('error', 'No associated company.');
        }

        $jobIds = $company->jobs()->pluck('id');

        $totalJobs = $company->jobs()->count();
        $totalApplications = Application::whereIn('job_id', $jobIds)->count();
        $featuredJobs = $company->jobs()->where('featured', true)->count();
        $latestJob = $company->jobs()->latest()->first();

        $acceptedCount = Application::whereIn('job_id', $jobIds)->where('status', 'Accepted')->count();
        $pendingCount = Application::whereIn('job_id', $jobIds)->where('status', 'Pending')->count();
        $rejectedCount = Application::whereIn('job_id', $jobIds)->where('status', 'Rejected')->count();

        $acceptanceRate = $totalApplications > 0 ? round(($acceptedCount / $totalApplications) * 100, 1) : 0;

        $mostAppliedJob = Job::withCount('applications')
            ->where('company_id', $company->id)
            ->orderByDesc('applications_count')
            ->first();

        $recentApplications = Application::with('user', 'job')
            ->whereIn('job_id', $jobIds)
            ->latest()
            ->take(5)
            ->get();

        return view('employer.home', compact(
            'totalJobs',
            'totalApplications',
            'featuredJobs',
            'latestJob',
            'acceptedCount',
            'pendingCount',
            'rejectedCount',
            'acceptanceRate',
            'mostAppliedJob',
            'recentApplications'
        ));
    }



    public function updateStatus(Request $request, Application $application)
    {
        // ✅ السماح فقط لصاحب العمل بتحديث الحالة
        if (!auth()->user()->isEmployer()) {
            return redirect()->back()->with('error', 'You are not authorized to update applications.');
        }

        // ✅ التحقق من صحة البيانات
        $request->validate([
            'status' => 'required|in:Pending,Accepted,Rejected',
        ]);

        // ✅ تحديث حالة الطلب
        $application->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }
   
}
