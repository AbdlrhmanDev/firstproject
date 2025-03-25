@extends('admin')

@section('dashboard-content')
    <div class="px-4 sm:px-6 md:px-8 py-6 space-y-12">
        {{-- Header --}}
        <div class="text-center">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white">👋 Welcome, Admin</h1>
            <p class="text-gray-400 mt-2 text-sm sm:text-base">Here’s a quick overview of what’s happening on the platform.
            </p>
        </div>

        {{-- 📊 Overview Cards --}}
        <div class="shadow-xl rounded-2xl p-4 sm:p-6 bg-white/5 border border-white/10 backdrop-blur-md">
            <h2 class="text-xl sm:text-2xl font-bold text-white text-center mb-6">📊 Dashboard Overview</h2>
            <div
                class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
                @php
                    $cards = [
                        ['icon' => '💼', 'label' => 'Total Jobs', 'value' => $totalJobs, 'color' => 'blue'],
                        ['icon' => '📄', 'label' => 'Applications', 'value' => $totalApplications, 'color' => 'green'],
                        ['icon' => '👤', 'label' => 'Users', 'value' => $totalUsers, 'color' => 'yellow'],
                        ['icon' => '🏢', 'label' => 'Employers', 'value' => $totalEmployers, 'color' => 'purple'],
                        ['icon' => '✅', 'label' => 'Acceptance Rate', 'value' => $acceptanceRate . '%', 'color' => 'teal'],
                        ['icon' => '⏳', 'label' => 'Pending Jobs', 'value' => $pendingJobs, 'color' => 'orange'],
                    ];
                @endphp

                @foreach ($cards as $card)
                    <div class="glass-card bg-{{ $card['color'] }}-500/20 border border-{{ $card['color'] }}-300/30">
                        <div class="flex items-center gap-4">
                            <div class="text-3xl sm:text-4xl">{{ $card['icon'] }}</div>
                            <div>
                                <h3 class="text-base sm:text-lg font-semibold text-white">{{ $card['label'] }}</h3>
                                <p class="text-2xl sm:text-3xl font-bold text-white">{{ $card['value'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- 🔍 Recent Activities --}}
        <div class="space-y-10">
            <h2 class="text-xl sm:text-2xl font-bold text-white mb-6">🔍 Recent Activities</h2>

            {{-- Section Grid Layout --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                {{-- Recent Users --}}
                <div class="col-span-1 bg-white/5 backdrop-blur-md border border-white/10 p-4 sm:p-6 rounded-2xl">
                    <h3 class="text-base sm:text-lg font-semibold text-white mb-4">🧑‍💻 New Registered Users</h3>
                    <div class="overflow-auto">
                        <table class="w-full text-white text-xs sm:text-sm">
                            <thead>
                                <tr class="text-left text-white/70 border-b border-white/10">
                                    <th class="py-2">Name</th>
                                    <th>Email</th>
                                    <th>Registered</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentUsers as $user)
                                    <tr class="border-b border-white/10">
                                        <td class="py-2">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Recent Jobs --}}
                <div class="col-span-1 bg-white/5 backdrop-blur-md border border-white/10 p-4 sm:p-6 rounded-2xl">
                    <h3 class="text-base sm:text-lg font-semibold text-white mb-4">📌 Recently Posted Jobs</h3>
                    <div class="overflow-auto">
                        <table class="w-full text-white text-xs sm:text-sm">
                            <thead>
                                <tr class="text-left text-white/70 border-b border-white/10">
                                    <th class="py-2">Title</th>
                                    <th>Company</th>
                                    <th>Posted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentJobs as $job)
                                    <tr class="border-b border-white/10">
                                        <td class="py-2">{{ $job->title }}</td>
                                        <td>{{ $job->company->company_name ?? 'N/A' }}</td>
                                        <td>{{ $job->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Recent Applications --}}
                <div class="col-span-1 bg-white/5 backdrop-blur-md border border-white/10 p-4 sm:p-6 rounded-2xl">
                    <h3 class="text-base sm:text-lg font-semibold text-white mb-4">📄 New Applications</h3>
                    <div class="overflow-auto">
                        <table class="w-full text-white text-xs sm:text-sm">
                            <thead>
                                <tr class="text-left text-white/70 border-b border-white/10">
                                    <th class="py-2">Candidate</th>
                                    <th>Job</th>
                                    <th>Status</th>
                                    <th>Applied</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentApplications as $app)
                                    <tr class="border-b border-white/10">
                                        <td class="py-2">{{ $app->user->name }}</td>
                                        <td>{{ $app->job->title }}</td>
                                        <td>{{ $app->status }}</td>
                                        <td>{{ $app->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection