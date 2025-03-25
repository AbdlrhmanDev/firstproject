@extends('dashboard')

@section('dashboard-content')
    <div class="min-h-screen  px-6 py-10">
        <h1 class="text-white text-4xl font-bold mb-8">👋 Welcome, {{ Auth::user()->name }}</h1>

        {{-- Dashboard Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            {{-- Total Resumes --}}
            <div class="bg-white/10 backdrop-blur-lg p-6 rounded-xl shadow-xl border border-white/20 text-white">
                <h2 class="text-xl font-semibold mb-2">📄 Total Resumes</h2>
                <p class="text-4xl font-bold">{{ $resumeCount }}</p>
            </div>

            {{-- Applications Submitted --}}
            <div class="bg-white/10 backdrop-blur-lg p-6 rounded-xl shadow-xl border border-white/20 text-white">
                <h2 class="text-xl font-semibold mb-2">📦 Applications Submitted</h2>
                <p class="text-4xl font-bold">{{ $applicationCount }}</p>
            </div>

            {{-- Job Suggestions --}}
            <div class="bg-white/10 backdrop-blur-lg p-6 rounded-xl shadow-xl border border-white/20 text-white">
                <h2 class="text-xl font-semibold mb-4">💡 Job Suggestions</h2>
                @forelse($suggestedJobs as $job)
                    <div class="mb-3">
                        <p class="font-medium text-lg">{{ $job->title }}</p>
                        <a href="{{ route('jobs.show', $job->id) }}" class="text-blue-400 hover:underline text-sm">View Job</a>
                    </div>
                @empty
                    <p class="text-gray-300 text-sm">No suggestions right now.</p>
                @endforelse
            </div>
        </div>

        {{-- Latest Resume --}}
        @if($latestResume)
            <div class="bg-white/10 backdrop-blur-lg p-6 rounded-xl shadow-xl border border-white/20 text-white mb-10">
                <h2 class="text-2xl font-bold mb-4">🧾 Latest Resume</h2>
                <p><strong class="text-purple-400">👤 Name:</strong> {{ $latestResume->full_name }}</p>
                <p><strong class="text-purple-400">📧 Email:</strong> {{ $latestResume->email }}</p>
                <p><strong class="text-purple-400">🛠 Skills:</strong> {{ $latestResume->skills }}</p>

                <div class="flex flex-wrap gap-4 mt-6">
                    <a href="{{ route('user.resume.edit', $latestResume->id) }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-md shadow transition-all duration-200">
                        ✏️ Edit
                    </a>
                    <a href="{{ route('user.resume.index') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow transition-all duration-200">
                        📄 View All
                    </a>
                </div>
            </div>
        @else
            <div class="bg-white/10 backdrop-blur-lg p-6 rounded-xl shadow-xl border border-white/20 text-white text-center">
                <p class="text-lg">🚫 You haven’t created any resumes yet.</p>
                <a href="{{ route('user.resume.create') }}"
                    class="mt-4 inline-block bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-md shadow transition-all">
                    ➕ Create Resume
                </a>
            </div>
        @endif
    </div>
@endsection