@extends('dashboard')

@section('dashboard-content')
    <div class="min-h-screen bg-opacity-80 p-8 relative">
        <!-- 🎨 Background Effects -->
        <div class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-purple-600/30 via-blue-500/30 to-teal-400/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500/30 via-fuchsia-500/30 to-pink-500/30 rounded-full blur-3xl"></div>

        <!-- 📊 Header Section -->
        <div class="relative z-10 mb-8">
            <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-2">My Applications</h2>
            <p class="text-gray-300">Track your job applications and their status</p>
        </div>

        <!-- 📄 Applications Table -->
        <div class="relative z-10">
            <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-xl shadow-2xl overflow-hidden">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-white/20 backdrop-blur-md">
                            <th class="p-4 text-left text-white/80 font-semibold border-b border-white/20">Job Title</th>
                            <th class="p-4 text-left text-white/80 font-semibold border-b border-white/20">Company</th>
                            <th class="p-4 text-left text-white/80 font-semibold border-b border-white/20">Status</th>
                            <th class="p-4 text-left text-white/80 font-semibold border-b border-white/20">Message</th>
                            <th class="p-4 text-left text-white/80 font-semibold border-b border-white/20">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            @php
                                $status = strtolower($order->status ?? 'pending');
                                $statusColor = match ($status) {
                                    'accepted' => 'bg-gradient-to-r from-green-500 to-emerald-500',
                                    'rejected' => 'bg-gradient-to-r from-red-500 to-rose-500',
                                    default => 'bg-gradient-to-r from-blue-500 to-indigo-500',
                                };
                            @endphp
                            <tr class="hover:bg-white/10 transition-all duration-300 group">
                                <td class="p-4 border-b border-white/10 group-hover:bg-white/5">
                                    <div class="flex items-center space-x-3">
                                        <span class="text-blue-400">💼</span>
                                        <span class="text-white">{{ $order->job->title }}</span>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-white/10 group-hover:bg-white/5">
                                    <div class="flex items-center space-x-3">
                                        <span class="text-blue-400">🏢</span>
                                        <span class="text-white">{{ $order->job->employer->name ?? 'N/A' }}</span>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-white/10 group-hover:bg-white/5">
                                    <span class="px-3 py-1 text-sm rounded-full {{ $statusColor }} text-white shadow-lg">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td class="p-4 border-b border-white/10 group-hover:bg-white/5 text-gray-300">
                                    {{ Str::limit($order->message, 50) }}
                                </td>
                                <td class="p-4 border-b border-white/10 group-hover:bg-white/5">
                                    <a href="{{ route('user.orders') }}"
                                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                                        <span class="mr-2">👁️</span>
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <span class="text-6xl">📝</span>
                                        <p class="text-xl text-gray-300">You haven't applied to any jobs yet.</p>
                                        <a href="{{ route('jobs.index') }}" 
                                            class="mt-4 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                                            Browse Jobs
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection