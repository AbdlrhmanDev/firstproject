@extends('layouts.app')

@section('title', 'Career Advice')

@section('content')
     <div class="container mx-auto px-6 py-12 ">
        <h1 class="text-4xl font-extrabold text-white mb-4">Career Advice</h1>
        <p class="text-gray-400 text-lg mb-8">Guidance and tips to help you grow in your career.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 rounded-lg">
            @foreach ($careerTips as $tip)
                <div
                    class=" rounded-lg bg-gray-800 p-6 rounded-xl shadow-lg border border-gray-700 hover:border-sky-500 transition-all duration-300">
                    <h3 class="text-lg font-semibold text-white">{{ $tip->title }}</h3>
                    <p class="text-gray-400 mt-2">{{ $tip->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

