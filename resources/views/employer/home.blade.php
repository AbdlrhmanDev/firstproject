@extends('employer.dashboard')

@section('dashboard-content')
    <div class="flex-1 p-8 overflow-auto">

        <h1 class="text-4xl font-extrabold text-white mb-10">👋 Welcome Back, {{ auth()->user()->name }}!</h1>

        {{-- 🔢 إحصائيات عامة --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-white">

            <div class="bg-gradient-to-br from-indigo-700 to-indigo-500 p-6 rounded-xl shadow-lg border border-white/10">
                <h2 class="text-lg font-medium mb-1">📌 Total Jobs</h2>
                <p class="text-3xl font-bold">{{ $totalJobs }}</p>
            </div>

            <div class="bg-gradient-to-br from-violet-700 to-purple-500 p-6 rounded-xl shadow-lg border border-white/10">
                <h2 class="text-lg font-medium mb-1">👥 Applicants</h2>
                <p class="text-3xl font-bold">{{ $totalApplications }}</p>
            </div>

            <div class="bg-gradient-to-br from-yellow-600 to-yellow-400 p-6 rounded-xl shadow-lg border border-white/10">
                <h2 class="text-lg font-medium mb-1">⭐ Featured</h2>
                <p class="text-3xl font-bold">{{ $featuredJobs }}</p>
            </div>

            <div class="bg-gradient-to-br from-teal-600 to-teal-400 p-6 rounded-xl shadow-lg border border-white/10">
                <h2 class="text-lg font-medium mb-1">📊 Acceptance Rate</h2>
                <p class="text-3xl font-bold">{{ $acceptanceRate }}%</p>
            </div>
        </div>

        {{-- 🧩 بيانات إضافية --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10 text-white">

            <div class="bg-white/5 p-6 rounded-xl shadow-md border border-white/10">
                <h2 class="text-lg font-medium mb-1">🕒 Latest Job Posted</h2>
                <p class="text-lg font-bold">{{ $latestJob ? $latestJob->title : 'No jobs yet' }}</p>
                @if($latestJob)
                    <p class="text-sm text-white/70 mt-1">Posted on {{ $latestJob->created_at->format('d M Y') }}</p>
                @endif
            </div>

            <div class="bg-white/5 p-6 rounded-xl shadow-md border border-white/10">
                <h2 class="text-lg font-medium mb-1">🔥 Most Applied Job</h2>
                @if($mostAppliedJob)
                    <p class="text-lg font-semibold">{{ $mostAppliedJob->title }}</p>
                    <p class="text-sm text-white/70">Applicants: {{ $mostAppliedJob->applications_count }}</p>
                @else
                    <p class="text-sm text-white/50">No data available</p>
                @endif
            </div>
        </div>

        {{-- 📊 حالات الطلبات --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10 text-white">
            <div class="bg-yellow-500/20 p-5 rounded-xl shadow-md border border-yellow-500/30">
                <h3 class="text-lg font-medium mb-1">⏳ Pending</h3>
                <p class="text-2xl font-bold">{{ $pendingCount }}</p>
            </div>

            <div class="bg-green-500/20 p-5 rounded-xl shadow-md border border-green-500/30">
                <h3 class="text-lg font-medium mb-1">✅ Accepted</h3>
                <p class="text-2xl font-bold">{{ $acceptedCount }}</p>
            </div>

            <div class="bg-red-500/20 p-5 rounded-xl shadow-md border border-red-500/30">
                <h3 class="text-lg font-medium mb-1">❌ Rejected</h3>
                <p class="text-2xl font-bold">{{ $rejectedCount }}</p>
            </div>
        </div>

        {{-- ➕ زر نشر وظيفة --}}
        <div class="mt-10">
            <a href="{{ route('employer.job.create') }}"
                class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-semibold shadow transition">
                ➕ Post New Job
            </a>
        </div>

        {{-- 📝 المتقدمين الجدد --}}
        <div class="mt-10 bg-white/5 p-6 rounded-2xl shadow-xl border border-white/10 text-white">
            <h2 class="text-2xl font-bold mb-4">📝 Recent Applicants</h2>
            <div class="overflow-auto">
                <table class="min-w-full divide-y divide-white/10">
                    <thead>
                        <tr class="text-left text-sm font-semibold text-white/80">
                            <th class="p-3">Candidate</th>
                            <th class="p-3">Job Title</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Applied On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentApplications as $application)
                            <tr class="border-t border-white/10 hover:bg-white/5 transition">
                                <td class="p-3">{{ $application->user->name }}</td>
                                <td class="p-3">{{ $application->job->title }}</td>
                                <td class="p-3">
                                    <span class="px-3 py-1 rounded-full text-sm font-medium
                                            @if($application->status === 'Pending') bg-yellow-500 text-black
                                            @elseif($application->status === 'Accepted') bg-green-500 text-white
                                            @else bg-red-500 text-white @endif">
                                        {{ $application->status }}
                                    </span>
                                </td>
                                <td class="p-3">{{ $application->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-3 text-center text-white/70">No recent applicants found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection