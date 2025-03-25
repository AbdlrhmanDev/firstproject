@extends('dashboard')

@section('dashboard-content')
    <div class="min-h-screen  bg-opacity-80 p-8">
        <h2 class="text-3xl text-white font-extrabold mb-6 text-center">📋 Your Resumes</h2>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- Resume List --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($resumes as $resume)
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-lg p-6 shadow-lg text-white">
                    <p><strong class="text-blue-400">👤 Name:</strong> {{ $resume->full_name }}</p>
                    <p><strong class="text-blue-400">📞 Phone:</strong> {{ $resume->phone }}</p>
                    <p><strong class="text-blue-400">📧 Email:</strong> {{ $resume->email }}</p>
                    <p><strong class="text-blue-400">🏠 Address:</strong> {{ $resume->address }}</p>

                    {{-- Action Buttons --}}
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('user.resume.show', $resume->id) }}"
                            class="text-sm bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                            🔍 View
                        </a>
                        <a href="{{ route('user.resume.edit', $resume->id) }}"
                            class="text-sm bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded transition">
                            ✏️ Edit
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-white text-center">
                    <p>You haven't created any resumes yet. 😢</p>
                    <a href="{{ route('user.resume.create') }}"
                        class="inline-block mt-4 bg-blue-600 px-4 py-2 text-white rounded hover:bg-blue-700 transition">
                        + Create Resume
                    </a>
                    
                </div>
            @endforelse

        </div>
    </div>
@endsection