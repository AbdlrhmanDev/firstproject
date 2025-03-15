{{-- @extends('layouts.app')

@section('title', 'Jobs')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-4xl font-bold text-center mb-6">Job Listings</h1>

        <a href="{{ route('jobs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block">
            Create New Job
        </a>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($jobs as $job)
                <div class="bg-gray-900 p-6 rounded-lg shadow-lg border border-gray-700">
                    <h3 class="text-xl font-bold">{{ $job->title }}</h3>
                    <p class="text-gray-400">{{ $job->type }} - {{ $job->salary }} USD</p>
                    <a href="{{ route('jobs.show', $job->id) }}" class="text-blue-400 hover:underline">View</a>
                    <a href="{{ route('jobs.edit', $job->id) }}" class="text-yellow-400 hover:underline">Edit</a>
                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:underline">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection --}}

@extends('layouts.app')

@section('title', 'Job Listings')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-extrabold text-white text-center mb-6">Job Listings</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('jobs.index') }}" class="mb-6 bg-gray-800 p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                <input type="text" name="search"
                    class="bg-gray-900 border border-gray-700 rounded-md px-4 py-2 text-white placeholder-gray-500"
                    placeholder="Search jobs..." value="{{ request('search') }}">

                <input type="number" name="min_salary"
                    class="bg-gray-900 border border-gray-700 rounded-md px-4 py-2 text-white placeholder-gray-500"
                    placeholder="Min Salary" value="{{ request('min_salary') }}">

                <input type="number" name="max_salary"
                    class="bg-gray-900 border border-gray-700 rounded-md px-4 py-2 text-white placeholder-gray-500"
                    placeholder="Max Salary" value="{{ request('max_salary') }}">

                <select name="featured" class="bg-gray-900 border border-gray-700 rounded-md px-4 py-2 text-white">
                    <option value="">All Jobs</option>
                    <option value="1" {{ request('featured') == "1" ? 'selected' : '' }}>Featured</option>
                    <option value="0" {{ request('featured') == "0" ? 'selected' : '' }}>Non-Featured</option>
                </select>

                <div class="flex space-x-2">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Search</button>
                    <a href="{{ route('jobs.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Reset</a>
                </div>
            </div>
        </form>

        <!-- Create Job Button -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('jobs.create') }}" class="bg-blue-500  hover:bg-green-600 text-white px-4 py-2 rounded-md">
                + Create New Job
            </a>
        </div>

        <!-- Job Listings -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            @foreach($jobs as $job)
                <a href="{{ route('jobs.show', $job->id) }}">
                                <div
                                    class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 hover:border-sky-500 transition-all duration-300">
                                    <h3 class="text-lg font-semibold text-white">{{ $job->title }}</h3>
                                    <p class="text-gray-400 mt-2">{{ $job->type }} - ${{ number_format($job->salary, 2) }} USD</p>
                {{-- 
                                    <div class="mt-4 flex space-x-4">

                                        <a href="{{ route('jobs.edit', $job->id) }}" class="text-yellow-400 hover:underline">Edit</a>

                                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:underline">Delete</button>
                                        </form>
                                    </div> --}}
                                </div>
                                </a>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-10 flex justify-center">
            {{ $jobs->links() }}
        </div>
    </div>
@endsection