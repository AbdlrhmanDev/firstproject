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
        <form action="{{ route('jobs.index') }}" method="GET" class="relative z-10 mb-12">
            <div class="p-6 bg-white/[0.05] backdrop-blur-xl rounded-2xl border border-white/10 shadow-xl">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    {{-- Search Input --}}
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-purple-400 transition-colors duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Search jobs..." 
                            class="w-full pl-12 pr-4 py-3 bg-white/[0.05] text-white rounded-xl border border-white/10 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all duration-200 placeholder-gray-400">
                    </div>

                    {{-- Min Salary --}}
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-purple-400 transition-colors duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="number" 
                            name="min_salary" 
                            value="{{ request('min_salary') }}"
                            placeholder="Min Salary" 
                            class="w-full pl-12 pr-4 py-3 bg-white/[0.05] text-white rounded-xl border border-white/10 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all duration-200 placeholder-gray-400">
                    </div>

                    {{-- Max Salary --}}
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-purple-400 transition-colors duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="number" 
                            name="max_salary" 
                            value="{{ request('max_salary') }}"
                            placeholder="Max Salary" 
                            class="w-full pl-12 pr-4 py-3 bg-white/[0.05] text-white rounded-xl border border-white/10 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all duration-200 placeholder-gray-400">
                    </div>

                    {{-- Featured Filter --}}
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-purple-400 transition-colors duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <select name="featured" 
                            class="w-full pl-12 pr-10 py-3 bg-[#1a1a1a] text-white rounded-full border border-gray-700 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all duration-200 appearance-none cursor-pointer hover:bg-[#252525]">
                            <option value="">Featured Jobs</option>
                            <option value="">All Jobs</option>
                            <option value="1" {{ request('featured') === '1' ? 'selected' : '' }}>Featured Jobs</option>
                            <option value="0" {{ request('featured') === '0' ? 'selected' : '' }}>Non-Featured Jobs</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Search Buttons --}}
                <div class="flex gap-4 mt-6">
                    <button type="submit" 
                        class="px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl font-medium transition-all duration-200 hover:scale-[1.02] hover:shadow-lg hover:shadow-purple-500/25 active:scale-[0.98]">
                        Search Jobs
                    </button>
                    <a href="{{ route('jobs.index') }}" 
                        class="px-6 py-3 bg-white/[0.05] text-white rounded-xl font-medium transition-all duration-200 hover:bg-white/[0.1] hover:scale-[1.02] active:scale-[0.98]">
                        Reset Filters
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
                <nav class="flex items-center space-x-2 bg-[#1a1a1a] rounded-full p-1 border border-purple-500/20 shadow-[0_0_15px_rgba(168,85,247,0.15)]">
                    <!-- Previous Page Link -->
                    @if ($jobs->onFirstPage())
                        <span class="px-4 py-2 text-gray-500 rounded-full opacity-50 cursor-not-allowed">
                            ← Prev
                        </span>
                    @else
                        <a href="{{ $jobs->previousPageUrl() }}"
                            class="px-4 py-2 text-white rounded-full transition-all duration-200 hover:bg-white/5">
                            ← Prev
                        </a>
                    @endif

                    <!-- Page Numbers -->
                    @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                        @if ($page == $jobs->currentPage())
                            <span class="px-4 py-2 bg-purple-500/10 text-purple-400 font-medium rounded-full">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" 
                                class="px-4 py-2 text-white rounded-full transition-all duration-200 hover:bg-white/5">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($jobs->hasMorePages())
                        <a href="{{ $jobs->nextPageUrl() }}"
                            class="px-4 py-2 text-white rounded-full transition-all duration-200 hover:bg-white/5">
                            Next →
                        </a>
                    @else
                        <span class="px-4 py-2 text-gray-500 rounded-full opacity-50 cursor-not-allowed">
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