@extends('layouts.app')

@section('title', 'Job Details')

@section('content')
    <div class="container mx-auto px-6 py-12 flex justify-center">
        <div class="max-w-3xl w-full p-10 rounded-2xl shadow-lg border border-gray-700 
                        bg-gray-800 bg-opacity-60 backdrop-blur-lg text-white transition-all duration-300 hover:shadow-xl">

            <!-- Job Title -->
            <h1 class="text-4xl font-extrabold text-center mb-6 text-white drop-shadow-lg">{{ $job->title }}</h1>

            <!-- Job Description -->
            <p class="text-gray-300 text-lg text-center leading-relaxed mb-6">
                {{ $job->description }}
            </p>

            <!-- Salary -->
            <div class="mb-4 text-center">
                <p class="text-lg"><strong>Salary:</strong>
                    <span class="text-green-400 font-bold">${{ number_format($job->salary, 2) }} USD</span>
                </p>
            </div>

            <!-- Tags -->
            <div class="mb-4 text-center">
                <p class="text-lg text-gray-300"><strong>Tags:</strong></p>
                <div class="flex flex-wrap justify-center gap-2 mt-2">
                    @foreach($job->tags as $tag)
                        <span class="bg-gray-700 bg-opacity-60 px-4 py-1 rounded-full text-sm text-white shadow-md">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between mt-8 ">
                <a href="{{ route('jobs.index') }}" class="flex items-center gap-2 bg-[#822a86] bg-opacity-100 hover:bg-blue-600 text-white px-4 py-2 rounded-lg 
                              shadow-md transition-all duration-300 transform hover:scale-105">
                    ⬅ Back to Jobs
                </a>
                {{-- <a href="{{ route('jobs.edit', $job->id) }}" class="flex items-center gap-2 bg-yellow-500 bg-opacity-90 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg 
                              shadow-md transition-all duration-300 transform hover:scale-105">
                    ✏ Edit Job
                </a>
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center gap-2 bg-red-500 bg-opacity-90 hover:bg-red-600 text-white px-4 py-2 rounded-lg 
                                       shadow-md transition-all duration-300 transform hover:scale-105">
                        🗑 Delete Job
                    </button>
                </form> --}}
            </div>
        </div>
    </div>
@endsection
