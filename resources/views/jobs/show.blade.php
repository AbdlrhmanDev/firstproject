{{-- @extends('layouts.app')

@section('title', 'Job Details')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-4xl font-bold text-center mb-6">{{ $job->title }}</h1>

        <div class="bg-gray-900 p-6 rounded-lg shadow-lg border border-gray-700">
            <h3 class="text-xl font-bold">{{ $job->title }}</h3>
            <p class="text-gray-400">{{ $job->description }}</p>
            <p class="text-gray-400">Salary: {{ $job->salary }} USD</p>
            <p class="text-gray-400">Tags:
                @foreach($job->tags as $tag)
                    <span class="bg-gray-700 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                @endforeach
            </p>

            <a href="{{ route('jobs.index') }}" class="text-blue-400 hover:underline">Back to Jobs</a>
        </div>
    </div>
@endsection --}}

@extends('layouts.app')

@section('title', 'Job Details')

@section('content')
    <div class="container mx-auto px-6 py-12 m-20 ">
        <h1 class="text-4xl font-extrabold text-white text-center mb-6 mx-5">{{ $job->title }}</h1>

        <div class="bg-gray-800  rounded-lg shadow-lg border border-gray-700 py-10">
            <h3 class="text-2xl font-semibold text-white mb-2 mx-5">{{ $job->title }}</h3>
            <p class="text-gray-400 text-lg mb-4 mx-5">{{ $job->description }}</p>

            <div class="mb-4 mx-5">
                <p class="text-gray-300"><strong>Salary:</strong> <span
                        class="text-green-400">${{ number_format($job->salary, 2) }} USD</span></p>
            </div>

            <div class="mb-4 mx-5" >
                <p class="text-gray-300"><strong>Tags:</strong></p>
                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach($job->tags as $tag)
                        <span class="bg-gray-700 px-4 py-1 rounded-full text-sm text-white">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-between mt-6 mx-5">
                <a href="{{ route('jobs.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                    ⬅ Back to Jobs
                </a>
                <a href="{{ route('jobs.edit', $job->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">
                    ✏ Edit Job
                </a>
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
                        🗑 Delete Job
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection