@extends('employer.dashboard')

@section('dashboard-content')
    <div class="container mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-white mb-2">Edit Job</h2>
            <p class="text-gray-300">Update the job listing details</p>
        </div>

        <!-- Form Section -->
        <div class="max-w-3xl mx-auto">
            <div class="bg-white/10 backdrop-blur-lg rounded-xl shadow-xl p-8 border border-white/20">
                <form action="{{ route('employer.job.update', $job->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Job Title -->
                    <div class="mb-6">
                        <label for="title" class="block text-white font-semibold mb-2">Job Title</label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               value="{{ $job->title }}"
                               class="w-full p-4 rounded-lg bg-white/5 border border-white/10 text-white 
                                      focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300
                                      placeholder-gray-400"
                               placeholder="Enter job title"
                               required>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label for="description" class="block text-white font-semibold mb-2">Description</label>
                        <textarea name="description" 
                                  id="description" 
                                  rows="6"
                                  class="w-full p-4 rounded-lg bg-white/5 border border-white/10 text-white 
                                         focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300
                                         placeholder-gray-400"
                                  placeholder="Enter job description"
                                  required>{{ $job->description }}</textarea>
                    </div>

                    <!-- Salary -->
                    <div class="mb-6">
                        <label for="salary" class="block text-white font-semibold mb-2">Salary (USD)</label>
                        <input type="number" 
                               name="salary" 
                               id="salary"
                               value="{{ $job->salary }}"
                               class="w-full p-4 rounded-lg bg-white/5 border border-white/10 text-white 
                                      focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300
                                      placeholder-gray-400"
                               placeholder="Enter salary amount">
                    </div>

                    <!-- Featured Toggle -->
                    <div class="flex items-center gap-3 mb-6">
                        <input type="checkbox" 
                               name="featured" 
                               id="featured" 
                               class="w-5 h-5 rounded bg-white/5 border border-white/10 
                                      focus:ring-2 focus:ring-blue-500 text-blue-500"
                               {{ $job->featured ? 'checked' : '' }}>
                        <label for="featured" class="text-white">
                            Mark as <span class="text-yellow-400 font-semibold">Featured</span>
                        </label>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center pt-6">
                        <!-- Cancel Button -->
                        <a href="{{ route('employer.job.index') }}"
                           class="px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-lg 
                                  hover:from-gray-600 hover:to-gray-700 transition-all duration-300 transform hover:scale-105 
                                  shadow-lg flex items-center gap-2">
                            <span>⬅</span>
                            <span>Cancel</span>
                        </a>

                        <!-- Update Button -->
                        <button type="submit" 
                                class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg 
                                       hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 
                                       shadow-lg flex items-center gap-2">
                            <span>✅</span>
                            <span>Update Job</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection