@extends('employer.dashboard')

@section('dashboard-content')
    <div class="container mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-white mb-2">Job Details</h2>
            <p class="text-gray-300">View and manage this job listing</p>
        </div>

        <!-- Job Details Card -->
        <div class="max-w-3xl mx-auto">
            <div class="bg-white/10 backdrop-blur-lg rounded-xl shadow-xl p-8 border border-white/20">
                <!-- Job Title -->
                <h1 class="text-3xl font-bold text-white mb-6">
                    {{ $job->title }}
                </h1>

                <!-- Job Description -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-white mb-2">Description</h3>
                    <p class="text-gray-300 leading-relaxed">
                        {{ $job->description }}
                    </p>
                </div>

                <!-- Salary -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-white mb-2">Salary</h3>
                    <p class="text-2xl text-green-400 font-bold">
                        ${{ number_format($job->salary, 2) }} USD
                    </p>
                </div>

                <!-- Featured Status -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-white mb-2">Status</h3>
                    @if ($job->featured)
                        <span class="px-3 py-1 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-full text-sm font-medium shadow-lg">
                            Featured
                        </span>
                    @else
                        <span class="px-3 py-1 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-full text-sm font-medium shadow-lg">
                            Regular
                        </span>
                    @endif
                </div>

                <!-- Tags -->
                @if($job->tags->count() > 0)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-white mb-2">Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($job->tags as $tag)
                                <span class="px-3 py-1 bg-white/10 text-white rounded-full text-sm font-medium shadow-lg">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="flex justify-between items-center pt-6">
                    <!-- Back Button -->
                    <a href="{{ route('employer.job.index') }}" 
                       class="px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-lg 
                              hover:from-gray-600 hover:to-gray-700 transition-all duration-300 transform hover:scale-105 
                              shadow-lg flex items-center gap-2">
                        <span>⬅</span>
                        <span>Back to Jobs</span>
                    </a>

                    <div class="flex gap-3">
                        <!-- Edit Button -->
                        <a href="{{ route('employer.job.edit', $job->id) }}" 
                           class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-amber-600 text-white rounded-lg 
                                  hover:from-yellow-600 hover:to-amber-700 transition-all duration-300 transform hover:scale-105 
                                  shadow-lg flex items-center gap-2">
                            <span>✏️</span>
                            <span>Edit</span>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('employer.job.destroy', $job->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this job?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-2 bg-gradient-to-r from-red-500 to-rose-600 text-white rounded-lg 
                                           hover:from-red-600 hover:to-rose-700 transition-all duration-300 transform hover:scale-105 
                                           shadow-lg flex items-center gap-2">
                                <span>🗑️</span>
                                <span>Delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
