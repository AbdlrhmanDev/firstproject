@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Hero Section -->
        <div class="text-center mb-12 animate-fade-in">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white">
                Find Your <span class="text-blue-400">Dream Job</span>
            </h1>
            <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto mt-4">
                Browse through thousands of job opportunities and take the next step in your career journey.
            </p>
        </div>

        <!-- Search Section -->
        <div class="mb-12 animate-slide-up" style="animation-delay: 100ms">
            <div class="bg-white/5 backdrop-blur-xl rounded-2xl border border-white/10 p-6 shadow-xl shadow-white/5">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Job title or keywords" 
                               class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 transition duration-300 hover:bg-white/[0.07]">
                    </div>
                    <div class="relative">
                        <input type="text" 
                               placeholder="Location" 
                               class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 transition duration-300 hover:bg-white/[0.07]">
                    </div>
                    <div class="relative">
                        <select class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition duration-300 hover:bg-white/[0.07]">
                            <option value="" class="bg-gray-900">Job Type</option>
                            <option value="full-time" class="bg-gray-900">Full Time</option>
                            <option value="part-time" class="bg-gray-900">Part Time</option>
                            <option value="contract" class="bg-gray-900">Contract</option>
                            <option value="remote" class="bg-gray-900">Remote</option>
                        </select>
                    </div>
                    <button class="bg-white/10 text-white font-semibold rounded-xl px-6 py-3 transition duration-300 hover:bg-white/[0.15] hover:scale-[1.02] active:scale-95">
                        Search Jobs
                    </button>
                </div>
            </div>
        </div>

        <!-- Jobs List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if($jobs->isEmpty())
                <!-- Skeleton Loading -->
                @for ($i = 0; $i < 6; $i++)
                    <div class="relative animate-slide-up" style="animation-delay: {{ $i * 100 }}ms">
                        <div class="bg-white/[0.05] backdrop-blur-xl rounded-xl border border-white/10 p-6">
                            <div class="animate-pulse space-y-4">
                                <div class="h-6 bg-white/10 rounded-lg w-3/4"></div>
                                <div class="space-y-2">
                                    <div class="h-4 bg-white/10 rounded-lg"></div>
                                    <div class="h-4 bg-white/10 rounded-lg w-5/6"></div>
                                </div>
                                <div class="flex gap-2">
                                    <div class="h-8 bg-white/10 rounded-full w-20"></div>
                                    <div class="h-8 bg-white/10 rounded-full w-24"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            @else
                @foreach ($jobs as $job)
                    <div class="group relative animate-slide-up" style="animation-delay: {{ $loop->index * 100 }}ms">
                        <div class="relative h-full bg-white/[0.05] backdrop-blur-xl rounded-xl border border-white/10 p-6 transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-white/5">
                            <!-- Header Section -->
                            <div class="flex justify-between items-start gap-4 mb-6">
                                <div>
                                    <h3 class="text-xl font-bold text-white group-hover:text-blue-400 transition duration-300">
                                        {{ $job->title }}
                                    </h3>
                                    <p class="text-sm text-gray-400 mt-1 flex items-center gap-2">
                                        <svg class="w-4 h-4 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Posted {{ $job->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <span class="px-3 py-1 bg-white/10 text-white rounded-full text-sm font-medium">
                                    {{ $job->type }}
                                </span>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-300 text-sm leading-relaxed mb-6">{{ Str::limit($job->description, 150) }}</p>

                            <!-- Salary -->
                            <div class="flex items-center gap-2 mb-6 group-hover:translate-x-1 transition-transform duration-300">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-white font-semibold">
                                    From {{ number_format($job->salary, 2) }} USD
                                </span>
                            </div>

                            <!-- Tags -->
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach ($job->tags as $tag)
                                    <span class="px-3 py-1.5 bg-white/5 text-gray-300 rounded-full text-sm border border-white/10 transition-all duration-300 hover:scale-105 hover:bg-white/10">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>

                            <!-- Apply Section -->
                            @if(auth()->check() && auth()->user()->role === 'user')
                                <a href="{{ route('jobs.show', $job) }}" 
                                   class="block w-full text-center bg-white/10 text-white py-3 px-6 rounded-xl font-medium transition-all duration-300 hover:bg-white/[0.15] hover:scale-[1.02] active:scale-95">
                                    View Details
                                </a>
                            @elseif(auth()->check() && auth()->user()->role !== 'user')
                                <div class="mt-6 text-center p-4 rounded-xl bg-white/5 border border-white/10">
                                    <p class="text-gray-400">Only job seekers can apply for jobs</p>
                                </div>
                            @else
                                <a href="{{ route('login') }}"
                                    class="block w-full text-center bg-white/10 text-white py-3 px-6 rounded-xl font-medium transition-all duration-300 hover:bg-white/[0.15] hover:scale-[1.02] active:scale-95">
                                    Sign in to Apply
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center animate-slide-up" style="animation-delay: 600ms">
            <nav class="flex items-center space-x-2">
                <a href="#" class="px-4 py-2 border border-white/10 rounded-xl text-white hover:bg-white/10 transition duration-300">
                    Previous
                </a>
                <a href="#" class="px-4 py-2 bg-white/10 text-white rounded-xl hover:bg-white/[0.15] transition duration-300">
                    1
                </a>
                <a href="#" class="px-4 py-2 border border-white/10 rounded-xl text-white hover:bg-white/10 transition duration-300">
                    2
                </a>
                <a href="#" class="px-4 py-2 border border-white/10 rounded-xl text-white hover:bg-white/10 transition duration-300">
                    3
                </a>
                <a href="#" class="px-4 py-2 border border-white/10 rounded-xl text-white hover:bg-white/10 transition duration-300">
                    Next
                </a>
            </nav>
        </div>
    </div>

    <style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slide-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    @keyframes pulse {
        50% {
            opacity: .5;
        }
    }

    .animate-fade-in {
        animation: fade-in 0.6s ease-out forwards;
    }

    .animate-slide-up {
        opacity: 0;
        animation: slide-up 0.6s ease-out forwards;
    }

    .animate-spin-slow {
        animation: spin-slow 4s linear infinite;
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    </style>
@endsection
