@extends('dashboard')

@section('dashboard-content')
    <div class="min-h-screen bg-opacity-80 p-8 relative">
        <!-- Background Effects -->
        <div class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-purple-600/20 via-blue-500/20 to-teal-400/20 rounded-full blur-3xl animate-slow-spin"></div>
        <div class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500/20 via-fuchsia-500/20 to-pink-500/20 rounded-full blur-3xl animate-slow-spin-reverse"></div>

        <!-- Header Section -->
        <div class="relative z-10 mb-12 text-center">
            <h2 class="text-4xl font-extrabold bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent mb-4">Your Resumes</h2>
            <p class="text-gray-300 text-lg">Manage your professional profiles</p>
            
            <!-- Create New Resume Button -->
            <a href="{{ route('user.resume.create') }}"
                class="inline-flex items-center gap-2 mt-6 px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 
                       text-white rounded-xl font-medium transition-all duration-300 hover:scale-[1.02] 
                       hover:shadow-lg hover:shadow-purple-500/25">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create New Resume
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div id="successMessage"
                class="relative z-10 bg-green-500/20 backdrop-blur-lg border border-green-500/30 text-green-400 
                       px-6 py-4 rounded-xl mb-8 text-center shadow-lg transition-all duration-500">
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Resume Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative z-10">
            @forelse ($resumes as $resume)
                <div class="group bg-gradient-to-br from-gray-900/80 to-gray-800/80 backdrop-blur-xl border border-white/10 
                           rounded-2xl p-6 shadow-xl transition-all duration-300 hover:shadow-2xl 
                           hover:shadow-purple-500/10 hover:scale-[1.02]">
                    <!-- Resume Info -->
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center gap-3 pb-4 border-b border-white/10">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 
                                      flex items-center justify-center text-white text-lg font-bold">
                                {{ substr($resume->full_name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="text-white font-semibold">{{ $resume->full_name }}</h3>
                                <p class="text-gray-400 text-sm">{{ $resume->email }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-gray-300">{{ $resume->phone }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-300">{{ $resume->address }}</span>
                        </div>

                        <!-- Skills Tags -->
                        @if($resume->skills)
                            <div class="flex flex-wrap gap-2 mt-4">
                                @php
                                    $skillsArray = explode(',', $resume->skills);
                                    $cleanSkills = array_map(function($skill) {
                                        // Remove all quotes, brackets, backslashes and trim whitespace
                                        $cleaned = preg_replace('/["\'\[\]\\\\]/', '', $skill);
                                        return trim($cleaned);
                                    }, $skillsArray);
                                    // Filter out empty skills
                                    $cleanSkills = array_filter($cleanSkills);
                                @endphp
                                @foreach($cleanSkills as $skill)
                                    @if(!empty($skill))
                                    <span class="px-3 py-1 bg-gray-800/50 text-gray-300 text-sm rounded-full 
                                               border border-gray-700 transition-all duration-300
                                               hover:bg-gray-700/50 hover:border-gray-600 hover:scale-105
                                               backdrop-blur-sm">
                                        {{ $skill }}
                                    </span>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <a href="{{ route('user.resume.show', $resume->id) }}"
                            class="flex-1 flex items-center justify-center gap-2 px-4 py-2.5 bg-white/5 text-white 
                                   rounded-xl hover:bg-white/10 transition-all duration-300 group-hover:scale-[1.02]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            View
                        </a>
                        <a href="{{ route('user.resume.edit', $resume->id) }}"
                            class="flex-1 flex items-center justify-center gap-2 px-4 py-2.5 bg-white/5 text-white 
                                   rounded-xl hover:bg-white/10 transition-all duration-300 group-hover:scale-[1.02]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('user.resume.destroy', $resume->id) }}" method="POST" class="flex-1"
                            onsubmit="return confirm('Are you sure you want to delete this resume?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-white/5 text-white 
                                       rounded-xl hover:bg-red-500/20 transition-all duration-300 group-hover:scale-[1.02]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-gradient-to-br from-gray-900/80 to-gray-800/80 backdrop-blur-xl border border-white/10 
                               rounded-2xl p-8 text-center shadow-xl">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full 
                                  flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl text-white font-semibold mb-2">No Resumes Yet</h3>
                        <p class="text-gray-400 mb-6">Create your first resume to start applying for jobs!</p>
                        <a href="{{ route('user.resume.create') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 
                                   text-white rounded-xl font-medium transition-all duration-300 hover:scale-[1.02] 
                                   hover:shadow-lg hover:shadow-purple-500/25">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Resume
                        </a>
                    </div>
                </div>
            @endforelse
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

    @keyframes slow-spin-reverse {
        from {
            transform: rotate(360deg);
        }
        to {
            transform: rotate(0deg);
        }
    }

    .animate-slow-spin {
        animation: slow-spin 20s linear infinite;
    }

    .animate-slow-spin-reverse {
        animation: slow-spin-reverse 25s linear infinite;
    }
    </style>

    <script>
        setTimeout(() => {
            const msg = document.getElementById('successMessage');
            if (msg) {
                msg.classList.add('opacity-0');
                setTimeout(() => msg.remove(), 500);
            }
        }, 5000);
    </script>
@endsection