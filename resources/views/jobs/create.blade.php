@extends('layouts.app')

@section('title', 'Career Advice')

@section('content')

    {{-- Background Glassmorphism Effects --}}
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none">
        <div class="w-72 h-72 bg-blue-500 rounded-full blur-3xl opacity-30"></div>
    </div>

    <h1 class="relative text-4xl font-extrabold text-white text-center mt-10">Career Advice</h1>
    <p class="text-gray-400 text-lg text-center mb-8">Guidance and tips to help you grow in your career.</p>

    <div class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 container mx-auto px-6 pb-12">
        {{-- Check if there are no career tips --}}
        @if($careerTips->isEmpty())
            {{-- Skeleton Loading Placeholder --}}
            @for ($i = 0; $i < 3; $i++)
                <div class="mx-auto w-full max-w-sm rounded-lg border border-white/20 bg-white/5 backdrop-blur-xl 
                backdrop-saturate-200 p-6 shadow-lg pointer-events-none">
                    <div class="flex animate-pulse space-x-4">
                        <div class="size-10 rounded-full bg-gray-200"></div>
                        <div class="flex-1 space-y-6 py-1">
                            <div class="h-2 rounded bg-gray-200"></div>
                            <div class="space-y-3">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="col-span-2 h-2 rounded bg-gray-200"></div>
                                    <div class="col-span-1 h-2 rounded bg-gray-200"></div>
                                </div>
                                <div class="h-2 rounded bg-gray-200"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        @else
            {{-- Actual Career Advice Content --}}
            @foreach ($careerTips as $tip)
                <div class="text-white bg-white/5 backdrop-blur-xl backdrop-saturate-200 p-6 rounded-lg border border-white/20 
                shadow-lg transition-all duration-300 hover:scale-105 hover:border-blue-800">
                    <h3 class="text-xl font-bold">{{ $tip->title }}</h3>
                    <p class="text-gray-300 mt-2">{{ $tip->description }}</p>
                </div>
            @endforeach
        @endif
    </div>

@endsection
