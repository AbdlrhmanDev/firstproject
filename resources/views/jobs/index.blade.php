@extends('layouts.app')

@section('title', 'Job Listings')

@section('content')
    <!-- Main Container -->
    <div class="container mx-auto px-6 py-12">
        <!-- Background Effects -->
        <div class="absolute inset-0 flex justify-center items-center pointer-events-none overflow-hidden">
            <div class="w-[500px] h-[500px] bg-gradient-to-br from-blue-600/20 via-indigo-500/20 to-purple-500/20 rounded-full blur-3xl opacity-50 animate-slow-spin"></div>
        </div>

        <!-- Page Header -->
        <div class="relative text-center mb-12 animate-fade-in">
            <h1 class="text-4xl font-bold text-white">Job Listings</h1>
            <p class="text-gray-400 mt-2">Find your next career opportunity</p>
        </div>

        <!-- Search and Filter Section -->
        <form method="GET" action="{{ route('jobs.index') }}"
            class="mb-6 relative bg-white/[0.05] backdrop-blur-xl rounded-xl border border-white/10 p-6 shadow-lg">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                <!-- Search Input -->
                <input type="text" name="search" placeholder="Search jobs..."
                    class="bg-white/[0.05] border border-white/10 rounded-xl px-4 py-2 text-white placeholder-gray-400 focus:border-white/20 focus:ring-1 focus:ring-white/20 transition-all duration-300 hover:bg-white/[0.07]"
                    value="{{ request('search') }}">

                <!-- Salary Range Inputs -->
                <input type="number" name="min_salary" placeholder="Min Salary"
                    class="bg-white/[0.05] border border-white/10 rounded-xl px-4 py-2 text-white placeholder-gray-400 focus:border-white/20 focus:ring-1 focus:ring-white/20 transition-all duration-300 hover:bg-white/[0.07]"
                    value="{{ request('min_salary') }}">

                <input type="number" name="max_salary" placeholder="Max Salary"
                    class="bg-white/[0.05] border border-white/10 rounded-xl px-4 py-2 text-white placeholder-gray-400 focus:border-white/20 focus:ring-1 focus:ring-white/20 transition-all duration-300 hover:bg-white/[0.07]"
                    value="{{ request('max_salary') }}">

                <!-- Featured Status Select -->
                <select name="featured"
                    class="bg-white/[0.05] border border-white/10 rounded-xl px-4 py-2 text-white focus:border-white/20 focus:ring-1 focus:ring-white/20 transition-all duration-300 hover:bg-white/[0.07] appearance-none cursor-pointer">
                    <option value="">All Jobs</option>
                    <option value="1" {{ request('featured') == '1' ? 'selected' : '' }}>Featured</option>
                    <option value="0" {{ request('featured') == '0' ? 'selected' : '' }}>Non-Featured</option>
                </select>

                <!-- Action Buttons -->
                <div class="flex space-x-2">
                    <button type="submit"
                        class="bg-white/10 text-white px-4 py-2 rounded-xl font-medium transition-all duration-300 hover:bg-white/[0.15] hover:scale-[1.02] active:scale-95">
                        Search
                    </button>
                    <a href="{{ route('jobs.index') }}"
                        class="bg-white/10 text-white px-4 py-2 rounded-xl font-medium transition-all duration-300 hover:bg-white/[0.15] hover:scale-[1.02] active:scale-95">
                        Reset
                    </a>
                </div>
            </div>
        </form>

        <!-- Job Listings Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($jobs as $job)
                <!-- Job Card -->
                <div class="group relative animate-slide-up" style="animation-delay: {{ $loop->index * 100 }}ms">
                    <div class="relative h-full bg-white/[0.05] backdrop-blur-xl rounded-xl border border-white/10 p-6 transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-white/5">
                        <!-- Header Section -->
                        <div class="flex justify-between items-start gap-4 mb-6">
                            <div>
                                <h3 class="text-xl font-bold text-white">{{ $job->title }}</h3>
                                <p class="text-sm text-gray-400 mt-1 flex items-center gap-2">
                                    <svg class="w-4 h-4 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Posted {{ $job->created_at->diffForHumans() }}
                                </p>
                            </div>
                            @if($job->featured)
                                <span class="px-3 py-1 bg-white/10 text-white rounded-full text-sm font-medium animate-pulse-subtle">
                                    Featured
                                </span>
                            @endif
                        </div>

                        <!-- Job Type and Location -->
                        <div class="flex items-center gap-4 mb-4">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-300">{{ $job->type }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-gray-300">{{ $job->location }}</span>
                            </div>
                        </div>

                        <!-- Description -->
                        <p class="text-gray-300 text-sm leading-relaxed mb-6 line-clamp-3">{{ $job->description }}</p>

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

                        <!-- Job Actions -->
                        <div class="mt-4 flex space-x-4">
                            <a href="{{ route('jobs.show', $job->id) }}" 
                                class="flex-1 bg-white/10 text-white px-4 py-2 rounded-xl font-medium transition-all duration-300 hover:bg-white/[0.15] hover:scale-[1.02] active:scale-95 text-center">
                                View Details
                            </a>
                            @if(auth()->check() && auth()->user()->role === 'user')
                                <form action="{{ url('/apply/' . $job->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    <button type="submit"
                                        class="w-full bg-white/10 text-white px-4 py-2 rounded-xl font-medium transition-all duration-300 hover:bg-white/[0.15] hover:scale-[1.02] active:scale-95">
                                        Apply Now
                                    </button>
                                </form>
                            @elseif(auth()->check() && auth()->user()->role !== 'user')
                                <div class="flex-1 text-center p-2 rounded-xl bg-white/5 border border-white/10">
                                    <p class="text-gray-400 text-sm">Only job seekers can apply</p>
                                </div>
                            @else
                                <a href="{{ route('login') }}"
                                    class="flex-1 text-center bg-white/10 text-white px-4 py-2 rounded-xl font-medium transition-all duration-300 hover:bg-white/[0.15] hover:scale-[1.02] active:scale-95">
                                    Sign in to Apply
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <!-- No Results Message -->
                <div class="col-span-full text-center p-6 rounded-xl bg-white/[0.05] border border-white/10">
                    <p class="text-gray-400">No jobs found for your search criteria. Try adjusting the filters.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination Section -->
        @if($jobs->hasPages())
            <div class="mt-10 flex justify-center">
                <nav class="flex items-center space-x-2">
                    <!-- Previous Page Link -->
                    @if ($jobs->onFirstPage())
                        <span class="px-3 py-2 text-gray-500 bg-white/[0.05] rounded-xl opacity-50 cursor-not-allowed">
                            ← Prev
                        </span>
                    @else
                        <a href="{{ $jobs->previousPageUrl() }}"
                            class="px-3 py-2 bg-white/10 text-white rounded-xl font-medium transition-all duration-300 hover:bg-white/[0.15] hover:scale-[1.02] active:scale-95">
                            ← Prev
                        </a>
                    @endif

                    <!-- Page Numbers -->
                    @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                        @if ($page == $jobs->currentPage())
                            <span class="px-4 py-2 bg-white/[0.15] text-white font-bold rounded-xl shadow-lg">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" 
                                class="px-4 py-2 bg-white/10 text-white rounded-xl font-medium transition-all duration-300 hover:bg-white/[0.15] hover:scale-[1.02] active:scale-95">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($jobs->hasMorePages())
                        <a href="{{ $jobs->nextPageUrl() }}"
                            class="px-3 py-2 bg-white/10 text-white rounded-xl font-medium transition-all duration-300 hover:bg-white/[0.15] hover:scale-[1.02] active:scale-95">
                            Next →
                        </a>
                    @else
                        <span class="px-3 py-2 text-gray-500 bg-white/[0.05] rounded-xl opacity-50 cursor-not-allowed">
                            Next →
                        </span>
                    @endif
                </nav>
            </div>
        @endif
    </div>

    <!-- Footer Section -->
    @include('layouts.footer')

    <style>
    @keyframes slow-spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

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

    @keyframes pulse-subtle {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.7;
        }
    }

    .animate-slow-spin {
        animation: slow-spin 20s linear infinite;
    }

    .animate-spin-slow {
        animation: slow-spin 4s linear infinite;
    }

    .animate-fade-in {
        animation: fade-in 0.6s ease-out forwards;
    }

    .animate-slide-up {
        opacity: 0;
        animation: slide-up 0.6s ease-out forwards;
    }

    .animate-pulse-subtle {
        animation: pulse-subtle 2s ease-in-out infinite;
    }
    </style>
@endsection