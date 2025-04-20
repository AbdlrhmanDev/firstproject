@extends('employer.dashboard')

@section('dashboard-content')
    <div class="flex-1 p-8 overflow-auto opacity-0 transform translate-y-4 transition-all duration-1000" id="employerDashboard">
        <div class="flex items-center justify-between mb-10">
            <h1 class="text-4xl font-extrabold text-white">👋 Welcome Back, {{ auth()->user()->name }}!</h1>
            <div class="flex space-x-4">
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl font-semibold shadow transition transform hover:scale-105">
                    <i class="fas fa-bell mr-2"></i>Notifications
                </button>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl font-semibold shadow transition transform hover:scale-105">
                    <i class="fas fa-cog mr-2"></i>Settings
                </button>
            </div>
        </div>

        {{-- 🔢 إحصائيات عامة --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-white">
            <div class="bg-gradient-to-br from-indigo-700 to-indigo-500 p-6 rounded-xl shadow-lg border border-white/10 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-medium">📌 Total Jobs</h2>
                    <i class="fas fa-briefcase text-2xl opacity-50"></i>
                </div>
                <p class="text-4xl font-bold mt-2">{{ $totalJobs }}</p>
                <div class="mt-2 h-1 bg-white/20 rounded-full">
                    <div class="h-1 bg-white rounded-full" style="width: 75%"></div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-violet-700 to-purple-500 p-6 rounded-xl shadow-lg border border-white/10 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-medium">👥 Applicants</h2>
                    <i class="fas fa-users text-2xl opacity-50"></i>
                </div>
                <p class="text-4xl font-bold mt-2">{{ $totalApplications }}</p>
                <div class="mt-2 h-1 bg-white/20 rounded-full">
                    <div class="h-1 bg-white rounded-full" style="width: 60%"></div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-yellow-600 to-yellow-400 p-6 rounded-xl shadow-lg border border-white/10 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-medium">⭐ Featured</h2>
                    <i class="fas fa-star text-2xl opacity-50"></i>
                </div>
                <p class="text-4xl font-bold mt-2">{{ $featuredJobs }}</p>
                <div class="mt-2 h-1 bg-white/20 rounded-full">
                    <div class="h-1 bg-white rounded-full" style="width: 45%"></div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-teal-600 to-teal-400 p-6 rounded-xl shadow-lg border border-white/10 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-medium">📊 Acceptance Rate</h2>
                    <i class="fas fa-chart-line text-2xl opacity-50"></i>
                </div>
                <p class="text-4xl font-bold mt-2">{{ $acceptanceRate }}%</p>
                <div class="mt-2 h-1 bg-white/20 rounded-full">
                    <div class="h-1 bg-white rounded-full" style="width: {{ $acceptanceRate }}%"></div>
                </div>
            </div>
        </div>

        {{-- 🧩 بيانات إضافية --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10 text-white">
            <div class="bg-white/5 p-6 rounded-xl shadow-md border border-white/10 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold">🕒 Latest Job Posted</h2>
                    <i class="fas fa-clock text-2xl opacity-50"></i>
                </div>
                <div class="bg-white/10 p-4 rounded-lg">
                    <p class="text-lg font-bold">{{ $latestJob ? $latestJob->title : 'No jobs yet' }}</p>
                    @if($latestJob)
                        <p class="text-sm text-white/70 mt-2">Posted on {{ $latestJob->created_at->format('d M Y') }}</p>
                    @endif
                </div>
            </div>

            <div class="bg-white/5 p-6 rounded-xl shadow-md border border-white/10 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold">🔥 Most Applied Job</h2>
                    <i class="fas fa-fire text-2xl opacity-50"></i>
                </div>
                <div class="bg-white/10 p-4 rounded-lg">
                    @if($mostAppliedJob)
                        <p class="text-lg font-semibold">{{ $mostAppliedJob->title }}</p>
                        <div class="flex items-center mt-2">
                            <div class="w-full bg-white/20 rounded-full h-2.5">
                                <div class="bg-yellow-500 h-2.5 rounded-full" style="width: {{ min(($mostAppliedJob->applications_count / 10) * 100, 100) }}%"></div>
                            </div>
                            <span class="ml-2 text-sm text-white/70">{{ $mostAppliedJob->applications_count }} applicants</span>
                        </div>
                    @else
                        <p class="text-sm text-white/50">No data available</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- 📊 حالات الطلبات --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10 text-white">
            <div class="bg-yellow-500/20 p-6 rounded-xl shadow-md border border-yellow-500/30 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold">⏳ Pending</h3>
                    <i class="fas fa-hourglass-half text-2xl opacity-50"></i>
                </div>
                <p class="text-3xl font-bold mt-2">{{ $pendingCount }}</p>
                <div class="mt-2 h-1 bg-yellow-500/30 rounded-full">
                    <div class="h-1 bg-yellow-500 rounded-full" style="width: 70%"></div>
                </div>
            </div>

            <div class="bg-green-500/20 p-6 rounded-xl shadow-md border border-green-500/30 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold">✅ Accepted</h3>
                    <i class="fas fa-check-circle text-2xl opacity-50"></i>
                </div>
                <p class="text-3xl font-bold mt-2">{{ $acceptedCount }}</p>
                <div class="mt-2 h-1 bg-green-500/30 rounded-full">
                    <div class="h-1 bg-green-500 rounded-full" style="width: 70%"></div>
                </div>
            </div>

            <div class="bg-red-500/20 p-6 rounded-xl shadow-md border border-red-500/30 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold">❌ Rejected</h3>
                    <i class="fas fa-times-circle text-2xl opacity-50"></i>
                </div>
                <p class="text-3xl font-bold mt-2">{{ $rejectedCount }}</p>
                <div class="mt-2 h-1 bg-red-500/30 rounded-full">
                    <div class="h-1 bg-red-500 rounded-full" style="width: 70%"></div>
                </div>
            </div>
        </div>

        {{-- ➕ زر نشر وظيفة --}}
        <div class="mt-10 flex justify-between items-center">
            <a href="{{ route('employer.job.create') }}"
                class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                <i class="fas fa-plus mr-2"></i> Post New Job
            </a>
            <div class="flex space-x-4">
                <button class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-xl font-semibold shadow transition-all duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-download mr-2"></i>Export Data
                </button>
                <button class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-xl font-semibold shadow transition-all duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
            </div>
        </div>

        {{-- 📝 المتقدمين الجدد --}}
        <div class="mt-10 bg-white/5 p-6 rounded-2xl shadow-xl border border-white/10 text-white hover:shadow-2xl transition-all duration-300">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">📝 Recent Applicants</h2>
                <div class="flex space-x-2">
                    <button class="bg-white/10 hover:bg-white/20 px-3 py-1 rounded-lg text-sm">
                        <i class="fas fa-sort mr-1"></i>Sort
                    </button>
                    <button class="bg-white/10 hover:bg-white/20 px-3 py-1 rounded-lg text-sm">
                        <i class="fas fa-search mr-1"></i>Search
                    </button>
                </div>
            </div>
            <div class="overflow-auto rounded-xl">
                <table class="min-w-full divide-y divide-white/10">
                    <thead>
                        <tr class="text-left text-sm font-semibold text-white/80 bg-white/5">
                            <th class="p-4">Candidate</th>
                            <th class="p-4">Job Title</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Applied On</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentApplications as $application)
                            <tr class="border-t border-white/10 hover:bg-white/5 transition">
                                <td class="p-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center mr-2">
                                            {{ substr($application->user->name, 0, 1) }}
                                        </div>
                                        <a href="#" class="hover:underline text-blue-400">
                                            {{ $application->user->name }}
                                        </a>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <a href="{{ route('jobs.show', $application->job_id) }}"
                                        class="hover:underline text-blue-300">
                                        {{ $application->job->title }}
                                    </a>
                                </td>
                                <td class="p-4">
                                    <span class="px-3 py-1 rounded-full text-sm font-medium
                                        @if($application->status === 'Pending') bg-yellow-500 text-black
                                        @elseif($application->status === 'Accepted') bg-green-500 text-white
                                        @else bg-red-500 text-white @endif">
                                        {{ $application->status }}
                                    </span>
                                </td>
                                <td class="p-4">{{ $application->created_at->format('d M Y') }}</td>
                                <td class="p-4">
                                    <button class="text-white/70 hover:text-white">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center text-white/70">No recent applicants found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dashboard = document.getElementById('employerDashboard');
            setTimeout(() => {
                dashboard.classList.remove('opacity-0', 'translate-y-4');
            }, 100);
        });
    </script>
@endsection