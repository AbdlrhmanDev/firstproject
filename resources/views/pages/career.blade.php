@extends('layouts.app')

@section('title', 'Career Advice')

@section('content')
    <div class="container mx-auto px-6 py-12 relative">
        <!-- Glassmorphism Background Effects -->
        <div
            class="absolute -top-10 -left-10 w-[400px] h-[400px] bg-gradient-to-br from-blue-600 via-purple-500 to-pink-500 opacity-40 rounded-full blur-3xl">
        </div>
        <div
            class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500 via-fuchsia-500 to-teal-400 opacity-40 rounded-full blur-3xl">
        </div>

        <h1 class="text-4xl font-extrabold text-white mb-4 text-center">Career Advice</h1>
        <p class="text-gray-300 text-lg mb-8 text-center">
            Guidance and tips to help you grow in your career.
        </p>

        <!-- Career Advice Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($careerTips as $tip)
                <div
                    class="relative rounded-lg bg-white/10 backdrop-blur-lg border border-white/20 shadow-xl p-6 transition-all duration-300 hover:scale-105 hover:border-blue-400">
                    <h3 class="text-lg font-semibold text-white">{{ $tip->title }}</h3>
                    <p class="text-gray-300 mt-2">{{ $tip->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection