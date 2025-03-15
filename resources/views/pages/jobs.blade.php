@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-extrabold text-white mb-4 text-center">Find Your Next Job</h1>
        <p class="text-gray-400 text-lg mb-8 text-center">Browse the latest job openings and start your career today.</p>

        <!-- Jobs List -->
        {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($jobs as $job)
                <div
                    class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 hover:border-sky-500 transition-all duration-300">
                    <h3 class="text-lg font-semibold text-white">{{ $job->title }}</h3>
                    <p class="text-gray-400 mt-2">{{ $job->type }} - From {{ number_format($job->salary, 2) }} USD</p>
                </div>
            @endforeach
        </div> --}}
    </div>
@endsection
