@extends('layouts.app')

@section('title', 'Job Portal')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <!-- Header -->
        <h1 class="text-4xl font-bold text-center mb-6">Let's Find Your Next Job</h1>

        <!-- Search Bar -->
        <div class="flex justify-center mb-10">
            <input type="text" placeholder="Web Developer..."
                class="w-full max-w-lg p-3 rounded-md bg-gray-700 border border-gray-700 text-white">
        </div>

        <!-- Featured Jobs Section -->
        <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-4">Featured Jobs</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($featuredJobs as $job)
                    <div
                        class="bg-gray-700 p-6 rounded-lg shadow-lg border-2 border-transparent hover:border-sky-500 transition-all duration-300 hover:scale-105">
                        <h3 class="text-xl font-bold">{{ $job->title }}</h3>
                        <p class="text-gray-500">{{ $job->description }}</p>
                        <h5 class="text-gray-400">{{ $job->salary }} USD</h5>

                        <div class="mt-2 flex flex-wrap gap-2">
                            @foreach ($job->tags as $tag)
                                <span class="bg-gray-700 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Tags Section -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold">Tags</h2>
            <div class="flex flex-wrap gap-2 mt-2">
                @foreach ($tags as $tag)
                    <span class="bg-gray-700 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>

        <!-- Recent Jobs Section -->
        <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-4">Recent Jobs</h2>
            @foreach ($recentJobs as $recentJob)
                <div
                    class="bg-gray-700 p-6 my-7 rounded-lg shadow-lg border-2 border-transparent hover:border-sky-500 transition-all duration-300">
                    <h3 class="text-xl font-bold hover:text-sky-500 transition-all duration-300">{{ $recentJob->title }}</h3>
                    <p class="text-gray-400">{{ $recentJob->type }} - From {{ $recentJob->salary }} USD</p>

                    <div class="mt-2 flex gap-2">
                        @foreach ($recentJob->tags as $tag)
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection