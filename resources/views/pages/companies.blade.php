@extends('layouts.app')


@section('title', 'Top Companies')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-extrabold text-white mb-4 text-center">Top Companies</h1>
        <p class="text-gray-400 text-lg mb-8 text-center">Discover the best companies to work for.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($companies as $company)
                <div
                    class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 hover:border-sky-500 transition-all duration-300">
                    <h3 class="text-lg font-semibold text-white">{{ $company->name }}</h3>
                    <p class="text-gray-400 mt-2">Industry: {{ $company->industry }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
