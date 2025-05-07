@extends('dashboard')

@section('dashboard-content')
    <div class="flex items-center justify-center min-h-screen bg-opacity-80 relative">
        <!-- Background Effects -->
        <div class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-purple-600/20 via-blue-500/20 to-teal-400/20 rounded-full blur-3xl animate-slow-spin"></div>
        <div class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500/20 via-fuchsia-500/20 to-pink-500/20 rounded-full blur-3xl animate-slow-spin-reverse"></div>

        <!-- Resume Card -->
        <div class="w-full max-w-3xl bg-gradient-to-br from-gray-900/80 to-gray-800/80 backdrop-blur-xl border border-white/10 rounded-2xl shadow-xl p-8 text-white z-10">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <h2 class="text-4xl font-extrabold bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">Resume Details</h2>
                <p class="text-gray-400 mt-2">Professional Profile</p>
            </div>

            <!-- Content Section -->
            <div class="space-y-6">
                <!-- Profile Header -->
                <div class="flex items-center gap-4 pb-4 border-b border-white/10">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center text-2xl font-bold">
                        {{ substr($resume->full_name, 0, 1) }}
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-white">{{ $resume->full_name }}</h3>
                        <p class="text-gray-400">{{ $resume->email }}</p>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 bg-white/5 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-500/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Phone</p>
                            <p class="text-white">{{ $resume->phone }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-purple-500/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Location</p>
                            <p class="text-white">{{ $resume->address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Skills Section -->
                <div class="space-y-3">
                    <h4 class="text-lg font-semibold text-blue-400 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                        Skills
                    </h4>
                    <div class="flex flex-wrap gap-2">
                        @php
                            $skillsArray = explode(',', $resume->skills ?? '');
                            $cleanSkills = array_filter(array_map(function($skill) {
                                return trim(preg_replace('/["\'\[\]\\\\]/', '', $skill));
                            }, $skillsArray));
                        @endphp
                        @foreach($cleanSkills as $skill)
                            <span class="px-3 py-1 bg-gray-800/80 text-gray-300 text-sm rounded-full 
                                       border border-gray-700 transition-all duration-300
                                       hover:bg-gray-700/50 hover:border-gray-600">
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- Experience Section -->
                <div class="space-y-3">
                    <h4 class="text-lg font-semibold text-blue-400 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Experience
                    </h4>
                    <div class="p-4 bg-white/5 rounded-xl">
                        <p class="text-gray-300 whitespace-pre-line">{{ $resume->experience }}</p>
                    </div>
                </div>

                <!-- Education Section -->
                <div class="space-y-3">
                    <h4 class="text-lg font-semibold text-blue-400 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                        </svg>
                        Education
                    </h4>
                    <div class="p-4 bg-white/5 rounded-xl">
                        <p class="text-gray-300 whitespace-pre-line">{{ $resume->education }}</p>
                    </div>
                </div>

                <!-- Summary Section -->
                <div class="space-y-3">
                    <h4 class="text-lg font-semibold text-blue-400 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Summary
                    </h4>
                    <div class="p-4 bg-white/5 rounded-xl">
                        <p class="text-gray-300 whitespace-pre-line">{{ $resume->summary }}</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mt-8">
                <a href="{{ route('user.resume.edit', $resume->id) }}"
                    class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 
                           text-white rounded-xl font-medium transition-all duration-300 hover:scale-105 
                           hover:shadow-lg hover:shadow-purple-500/25">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Resume
                </a>

                <a href="{{ route('user.resume.index') }}"
                    class="flex items-center gap-2 px-6 py-3 bg-gray-800/50 border border-gray-700
                           text-white rounded-xl font-medium transition-all duration-300 hover:scale-105
                           hover:bg-gray-700/50 hover:border-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Resumes
                </a>
            </div>

            <!-- Last Updated -->
            <div class="flex items-center justify-center gap-2 mt-8 text-sm text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Last updated: {{ $resume->updated_at->format('F j, Y g:i A') }}
            </div>
        </div>
    </div>

    <style>
    @keyframes slow-spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes slow-spin-reverse {
        from { transform: rotate(360deg); }
        to { transform: rotate(0deg); }
    }

    .animate-slow-spin {
        animation: slow-spin 20s linear infinite;
    }

    .animate-slow-spin-reverse {
        animation: slow-spin-reverse 25s linear infinite;
    }
    </style>
@endsection