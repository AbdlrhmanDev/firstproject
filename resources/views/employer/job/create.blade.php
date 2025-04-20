@extends('employer.dashboard')

@section('dashboard-content')
    <div class="container mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-white mb-2">Create New Job</h2>
            <p class="text-gray-300">Fill in the details to post a new job listing</p>
        </div>

        <!-- Form Section -->
        <div class="max-w-3xl mx-auto">
            <div class="bg-white/10 backdrop-blur-lg rounded-xl shadow-xl p-8 border border-white/20">
                <form action="{{ route('employer.job.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Job Title -->
                    <div>
                        <label for="title" class="block text-white font-semibold mb-2">Job Title</label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               class="w-full p-4 rounded-lg bg-white/5 border border-white/10 text-white 
                                      focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300
                                      placeholder-gray-400"
                               placeholder="Enter job title"
                               required>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-white font-semibold mb-2">Description</label>
                        <textarea name="description" 
                                  id="description" 
                                  rows="6"
                                  class="w-full p-4 rounded-lg bg-white/5 border border-white/10 text-white 
                                         focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300
                                         placeholder-gray-400"
                                  placeholder="Enter job description"
                                  required></textarea>
                    </div>

                    <!-- Salary -->
                    <div>
                        <label for="salary" class="block text-white font-semibold mb-2">Salary (USD)</label>
                        <input type="number" 
                               name="salary" 
                               id="salary"
                               class="w-full p-4 rounded-lg bg-white/5 border border-white/10 text-white 
                                      focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300
                                      placeholder-gray-400"
                               placeholder="Enter salary amount">
                    </div>

                    <!-- Featured Toggle -->
                    <div class="flex items-center gap-3">
                        <input type="checkbox" 
                               name="featured" 
                               id="featured" 
                               class="w-5 h-5 rounded bg-white/5 border border-white/10 
                                      focus:ring-2 focus:ring-blue-500 text-blue-500">
                        <label for="featured" class="text-white">
                            Mark as <span class="text-yellow-400 font-semibold">Featured</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-4 px-6 
                                       rounded-xl font-bold transition-all duration-300 transform hover:scale-105 
                                       shadow-lg hover:from-blue-600 hover:to-purple-700 flex items-center justify-center gap-2">
                            <span>🚀</span>
                            <span>Post Job</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection