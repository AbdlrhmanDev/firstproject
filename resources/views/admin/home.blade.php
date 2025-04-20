@extends('admin')

@section('dashboard-content')
    <div class="px-4 sm:px-6 md:px-8 py-6 space-y-12 opacity-0 transform translate-y-4 transition-all duration-1000" id="adminDashboard">
        {{-- Header --}}
        <div class="text-center">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">👋 Welcome, Admin</h1>
            <p class="text-gray-400 mt-2 text-sm sm:text-base">Here's a quick overview of what's happening on the platform.
            </p>
        </div>

        {{-- 📊 Overview Cards --}}
        <div class="shadow-xl rounded-2xl p-4 sm:p-6 bg-white/5 border border-white/10 backdrop-blur-md hover:shadow-2xl transition-all duration-300">
            <h2 class="text-xl sm:text-2xl font-bold text-white text-center mb-6 bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">📊 Dashboard Overview</h2>
            <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
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
                    <div class="glass-card bg-{{ $card['color'] }}-500/20 border border-{{ $card['color'] }}-300/30 hover:scale-105 transition-all duration-300 transform hover:shadow-lg">
                        <div class="flex items-center gap-4 p-4">
                            <div class="text-3xl sm:text-4xl transform hover:scale-110 transition-transform duration-300">{{ $card['icon'] }}</div>
                            <div>
                                <h3 class="text-base sm:text-lg font-semibold text-white">{{ $card['label'] }}</h3>
                                <p class="text-2xl sm:text-3xl font-bold text-white bg-gradient-to-r from-{{ $card['color'] }}-400 to-{{ $card['color'] }}-600 bg-clip-text text-transparent">{{ $card['value'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- 🔍 Recent Activities --}}
        <div class="space-y-10">
            <h2 class="text-xl sm:text-2xl font-bold text-white mb-6 bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">🔍 Recent Activities</h2>

            {{-- Section Grid Layout --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                {{-- Recent Users --}}
                <div class="col-span-1 bg-white/5 backdrop-blur-md border border-white/10 p-4 sm:p-6 rounded-2xl hover:shadow-xl transition-all duration-300">
                    <h3 class="text-base sm:text-lg font-semibold text-white mb-4 flex items-center gap-2">
                        <span class="text-xl">🧑‍💻</span>
                        New Registered Users
                    </h3>
                    <div class="overflow-auto">
                        <table class="w-full text-white text-xs sm:text-sm">
                            <thead>
                                <tr class="text-left text-white/70 border-b border-white/10">
                                    <th class="py-3 px-2">Name</th>
                                    <th class="px-2">Email</th>
                                    <th class="px-2">Registered</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentUsers as $user)
                                    <tr class="border-b border-white/10 hover:bg-white/10 transition-colors duration-200">
                                        <td class="py-3 px-2">{{ $user->name }}</td>
                                        <td class="px-2">{{ $user->email }}</td>
                                        <td class="px-2">{{ $user->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Recent Jobs --}}
                <div class="col-span-1 bg-white/5 backdrop-blur-md border border-white/10 p-4 sm:p-6 rounded-2xl hover:shadow-xl transition-all duration-300">
                    <h3 class="text-base sm:text-lg font-semibold text-white mb-4 flex items-center gap-2">
                        <span class="text-xl">📌</span>
                        Recently Posted Jobs
                    </h3>
                    <div class="overflow-auto">
                        <table class="w-full text-white text-xs sm:text-sm">
                            <thead>
                                <tr class="text-left text-white/70 border-b border-white/10">
                                    <th class="py-3 px-2">Title</th>
                                    <th class="px-2">Company</th>
                                    <th class="px-2">Posted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentJobs as $job)
                                    <tr class="border-b border-white/10 hover:bg-white/10 transition-colors duration-200">
                                        <td class="py-3 px-2">{{ $job->title }}</td>
                                        <td class="px-2">{{ $job->company->company_name ?? 'N/A' }}</td>
                                        <td class="px-2">{{ $job->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Recent Applications --}}
                <div class="col-span-1 bg-white/5 backdrop-blur-md border border-white/10 p-4 sm:p-6 rounded-2xl hover:shadow-xl transition-all duration-300">
                    <h3 class="text-base sm:text-lg font-semibold text-white mb-4 flex items-center gap-2">
                        <span class="text-xl">📄</span>
                        New Applications
                    </h3>
                    <div class="overflow-auto">
                        <table class="w-full text-white text-xs sm:text-sm">
                            <thead>
                                <tr class="text-left text-white/70 border-b border-white/10">
                                    <th class="py-3 px-2">Candidate</th>
                                    <th class="px-2">Job</th>
                                    <th class="px-2">Status</th>
                                    <th class="px-2">Applied</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentApplications as $app)
                                    <tr class="border-b border-white/10 hover:bg-white/10 transition-colors duration-200">
                                        <td class="py-3 px-2">{{ $app->user->name }}</td>
                                        <td class="px-2">{{ $app->job->title }}</td>
                                        <td class="px-2">
                                            <span class="px-2 py-1 rounded-full text-xs {{ $app->status === 'approved' ? 'bg-green-500/20 text-green-400' : ($app->status === 'rejected' ? 'bg-red-500/20 text-red-400' : 'bg-yellow-500/20 text-yellow-400') }}">
                                                {{ $app->status }}
                                            </span>
                                        </td>
                                        <td class="px-2">{{ $app->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dashboard = document.getElementById('adminDashboard');
            setTimeout(() => {
                dashboard.classList.remove('opacity-0', 'translate-y-4');
            }, 100);
        });
    </script>
@endsection