@extends('layouts.app')

@section('title', 'Job Details')

@section('content')
    <!-- Background Effects -->
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none overflow-hidden">
        <div class="w-[500px] h-[500px] bg-gradient-to-br from-blue-600/20 via-indigo-500/20 to-purple-500/20 rounded-full blur-3xl opacity-50 animate-slow-spin"></div>
    </div>

    <div class="container mx-auto px-6 py-12 flex justify-center">
        <div class="max-w-3xl w-full p-10 rounded-2xl shadow-2xl border border-white/10 
                    bg-gradient-to-br from-gray-900/80 to-gray-800/80 backdrop-blur-xl text-white 
                    transition-all duration-300 hover:shadow-[0_0_30px_rgba(168,85,247,0.2)]">

            <!-- Job Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-extrabold mb-4 bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">
                    {{ $job->title }}
                </h1>
                
                <!-- Posted Time -->
                <div class="flex items-center justify-center gap-2 text-gray-400 mb-6">
                    <svg class="w-5 h-5 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Posted {{ $job->created_at->diffForHumans() }}</span>
                </div>
            </div>

            <!-- Job Details Card -->
            <div class="bg-white/5 rounded-xl p-6 mb-8 border border-white/10">
                <!-- Description -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4 text-white">Job Description</h2>
                    <p class="text-gray-300 leading-relaxed">
                        {{ $job->description }}
                    </p>
                </div>

                <!-- Salary -->
                <div class="flex items-center gap-3 mb-6 p-4 bg-white/5 rounded-lg border border-white/10">
                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <p class="text-gray-400">Salary</p>
                        <p class="text-2xl font-bold text-green-400">${{ number_format($job->salary, 2) }} USD</p>
                    </div>
                </div>

                <!-- Tags -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-4 text-white">Skills & Requirements</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach($job->tags as $tag)
                            <span class="px-4 py-2 bg-white/5 text-white rounded-full text-sm 
                                      border border-white/10 hover:bg-white/10 transition-all duration-300 
                                      hover:scale-105 hover:shadow-lg hover:shadow-purple-500/10">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between items-center mt-8">
                <a href="{{ route('jobs.index') }}" 
                   class="flex items-center gap-2 px-6 py-3 bg-white/10 text-white rounded-xl 
                          hover:bg-white/20 transition-all duration-300 hover:scale-105 
                          hover:shadow-lg hover:shadow-purple-500/10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Jobs
                </a>

                @if(auth()->check() && auth()->user()->role === 'user')
                    <form action="{{ url('/apply/' . $job->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-600 
                                   text-white rounded-xl font-medium transition-all duration-300 
                                   hover:scale-105 hover:shadow-lg hover:shadow-purple-500/25">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Apply Now
                        </button>
                    </form>
                @elseif(auth()->check() && auth()->user()->role !== 'user')
                    <div class="px-6 py-3 bg-white/5 text-gray-400 rounded-xl border border-white/10">
                        Only job seekers can apply
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-2 px-8 py-3 bg-white/10 text-white rounded-xl 
                               hover:bg-white/20 transition-all duration-300 hover:scale-105 
                               hover:shadow-lg hover:shadow-purple-500/10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Sign in to Apply
                    </a>
                @endif
            </div>
        </div>
    </div>

    <style>
    @keyframes slow-spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
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

    .animate-slow-spin {
        animation: slow-spin 20s linear infinite;
    }

    .animate-spin-slow {
        animation: spin-slow 4s linear infinite;
    }
    </style>
@endsection
