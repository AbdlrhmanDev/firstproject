@extends('dashboard')

@section('dashboard-content')
    <div class="min-h-screen px-6 py-10 opacity-0 transform translate-y-4 transition-all duration-1000" id="userDashboard">
        <!-- 👋 Welcome -->
        <div class="mb-10">
            <h1 class="text-white text-4xl font-bold mb-2">👋 Welcome, {{ Auth::user()->name }}</h1>
            <p class="text-gray-300 text-lg">Here's your personalized dashboard</p>
        </div>

        <!-- 📊 Dashboard Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            @php
                $stats = [
                    ['title' => '📄 Total Resumes', 'value' => $resumeCount, 'color' => 'from-purple-500 to-indigo-600'],
                    ['title' => '📦 Applications Submitted', 'value' => $applicationCount, 'color' => 'from-blue-500 to-cyan-600'],
                ];
            @endphp

            @foreach ($stats as $stat)
                <div class="bg-gradient-to-br {{ $stat['color'] }} p-6 rounded-xl shadow-xl transform hover:scale-105 transition-transform duration-300">
                    <h2 class="text-xl font-semibold mb-2 text-white">{{ $stat['title'] }}</h2>
                    <p class="text-4xl font-bold text-white">{{ $stat['value'] }}</p>
                </div>
            @endforeach

            <!-- 💡 Job Suggestions -->
            <div class="bg-gradient-to-br from-green-500 to-emerald-600 p-6 rounded-xl shadow-xl transform hover:scale-105 transition-transform duration-300">
                <h2 class="text-xl font-semibold mb-4 text-white">💡 Job Suggestions</h2>
                <div class="space-y-3">
                    @forelse($suggestedJobs as $job)
                        <div class="bg-white/10 p-3 rounded-lg backdrop-blur-sm">
                            <p class="font-medium text-lg text-white">{{ $job->title }}</p>
                            <a href="{{ route('jobs.show', $job->id) }}" 
                               class="text-white hover:text-blue-200 text-sm inline-flex items-center gap-1 transition-colors">
                                View Job <span class="text-lg">→</span>
                            </a>
                        </div>
                    @empty
                        <p class="text-white/80 text-sm">No suggestions at the moment.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- 🧾 Latest Resume -->
        @if($latestResume)
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-8 rounded-xl shadow-xl border border-gray-700 mb-10 transform hover:scale-[1.01] transition-transform duration-300">
                <h2 class="text-2xl font-bold mb-6 text-white flex items-center gap-2">
                    <span class="bg-purple-500 p-2 rounded-lg">🧾</span>
                    Latest Resume
                </h2>

                <div class="space-y-4 text-gray-300">
                    <div class="flex items-center gap-3">
                        <span class="text-purple-400">👤</span>
                        <p><strong>Name:</strong> {{ $latestResume->full_name }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-purple-400">📧</span>
                        <p><strong>Email:</strong> {{ $latestResume->email }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-purple-400">🛠</span>
                        <p><strong>Skills:</strong> {{ $latestResume->skills }}</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4 mt-8">
                    <a href="{{ route('user.resume.edit', $latestResume->id) }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                        <span>✏️</span> Edit Resume
                    </a>
                    <a href="{{ route('user.resume.index') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                        <span>📄</span> View All
                    </a>
                </div>
            </div>
        @else
            <!-- ❌ No Resume Created -->
            <div class="bg-gradient-to-br from-red-500 to-pink-600 p-8 rounded-xl shadow-xl text-center transform hover:scale-[1.01] transition-transform duration-300">
                <p class="text-xl text-white mb-6">🚫 You haven't created any resumes yet.</p>
                <a href="{{ route('user.resume.create') }}"
                    class="inline-block bg-white hover:bg-gray-100 text-red-500 px-8 py-3 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 font-semibold">
                    ➕ Create Your First Resume
                </a>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dashboard = document.getElementById('userDashboard');
            setTimeout(() => {
                dashboard.classList.remove('opacity-0', 'translate-y-4');
            }, 100);
        });
    </script>
@endsection