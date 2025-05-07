@extends('employer.dashboard')

@section('dashboard-content')
    <!-- Background Effects -->
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none overflow-hidden">
        <div class="w-[500px] h-[500px] bg-gradient-to-br from-blue-600/20 via-indigo-500/20 to-purple-500/20 rounded-full blur-3xl opacity-50 animate-slow-spin"></div>
    </div>

    <div class="container mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent mb-4">
                Create New Job
            </h2>
            <p class="text-gray-300 text-lg">Fill in the details to post a new job listing</p>
        </div>

        <!-- Form Section -->
        <div class="max-w-3xl mx-auto">
            <div class="bg-gradient-to-br from-gray-900/80 to-gray-800/80 backdrop-blur-xl rounded-2xl 
                        shadow-2xl p-8 border border-white/10 hover:shadow-[0_0_30px_rgba(168,85,247,0.2)] 
                        transition-all duration-300">
                <form action="{{ route('employer.job.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Job Title -->
                    <div class="group">
                        <label for="title" class="block text-white font-semibold mb-3 text-lg">Job Title</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-400 transition-colors duration-150" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   class="w-full pl-12 pr-4 py-4 rounded-xl bg-white/5 border border-white/10 
                                          text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent 
                                          transition-all duration-300 placeholder-gray-400
                                          group-hover:bg-white/10"
                                   placeholder="Enter job title"
                                   required>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="group">
                        <label for="description" class="block text-white font-semibold mb-3 text-lg">Description</label>
                        <div class="relative">
                            <div class="absolute top-4 left-4 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-400 transition-colors duration-150" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <textarea name="description" 
                                      id="description" 
                                      rows="6"
                                      class="w-full pl-12 pr-4 pt-4 rounded-xl bg-white/5 border border-white/10 
                                             text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent 
                                             transition-all duration-300 placeholder-gray-400
                                             group-hover:bg-white/10"
                                      placeholder="Enter job description"
                                      required></textarea>
                        </div>
                    </div>

                    <!-- Salary -->
                    <div class="group">
                        <label for="salary" class="block text-white font-semibold mb-3 text-lg">Salary (USD)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-400 transition-colors duration-150" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <input type="number" 
                                   name="salary" 
                                   id="salary"
                                   class="w-full pl-12 pr-4 py-4 rounded-xl bg-white/5 border border-white/10 
                                          text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent 
                                          transition-all duration-300 placeholder-gray-400
                                          group-hover:bg-white/10"
                                   placeholder="Enter salary amount">
                        </div>
                    </div>

                    <!-- Featured Toggle -->
                    <div class="flex items-center gap-3 p-4 bg-white/5 rounded-xl border border-white/10 
                               hover:bg-white/10 transition-all duration-300">
                        <input type="checkbox" 
                               name="featured" 
                               id="featured" 
                               class="w-5 h-5 rounded bg-white/5 border border-white/10 
                                      focus:ring-2 focus:ring-purple-500 text-purple-500
                                      checked:bg-purple-500 checked:border-purple-500">
                        <label for="featured" class="text-white text-lg">
                            Mark as <span class="text-purple-400 font-semibold">Featured</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white py-4 px-6 
                                       rounded-xl font-bold transition-all duration-300 transform hover:scale-[1.02] 
                                       shadow-lg hover:shadow-purple-500/25 flex items-center justify-center gap-3
                                       hover:from-purple-700 hover:to-blue-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span class="text-lg">Post Job</span>
                        </button>
                    </div>
                </form>
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

    .animate-slow-spin {
        animation: slow-spin 20s linear infinite;
    }
    </style>
@endsection