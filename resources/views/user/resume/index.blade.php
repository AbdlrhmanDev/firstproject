@extends('dashboard')

@section('dashboard-content')
    <div class="min-h-screen bg-opacity-80 p-8 relative">
        <!-- Background Effects -->
        <div class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-purple-600/30 via-blue-500/30 to-teal-400/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500/30 via-fuchsia-500/30 to-pink-500/30 rounded-full blur-3xl"></div>

        <!-- Header Section -->
        <div class="relative z-10 mb-8">
            <h2 class="text-3xl text-white font-extrabold text-center mb-2">📋 Your Resumes</h2>
            <p class="text-gray-300 text-center">Manage your professional profiles</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div id="successMessage"
                class="relative z-10 bg-green-500/20 backdrop-blur-lg border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6 text-center shadow-lg transition-opacity duration-500">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- Resume Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative z-10">
            @forelse ($resumes as $resume)
                <div class="group bg-white/10 hover:bg-white/15 backdrop-blur-xl border border-white/20 rounded-xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]">
                    <!-- Resume Info -->
                    <div class="space-y-3 mb-4">
                        <p class="flex items-center space-x-2">
                            <span class="text-blue-400">👤</span>
                            <span class="text-gray-300">{{ $resume->full_name }}</span>
                        </p>
                        <p class="flex items-center space-x-2">
                            <span class="text-blue-400">📞</span>
                            <span class="text-gray-300">{{ $resume->phone }}</span>
                        </p>
                        <p class="flex items-center space-x-2">
                            <span class="text-blue-400">📧</span>
                            <span class="text-gray-300">{{ $resume->email }}</span>
                        </p>
                        <p class="flex items-center space-x-2">
                            <span class="text-blue-400">🏠</span>
                            <span class="text-gray-300">{{ $resume->address }}</span>
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between gap-2">
                        <a href="{{ route('user.resume.show', $resume->id) }}"
                            class="flex-1 bg-blue-600/80 hover:bg-blue-600 text-white text-center px-4 py-2 rounded-lg transition-all duration-300 hover:scale-[1.02]">
                            🔍 View
                        </a>
                        <a href="{{ route('user.resume.edit', $resume->id) }}"
                            class="flex-1 bg-yellow-600/80 hover:bg-yellow-600 text-white text-center px-4 py-2 rounded-lg transition-all duration-300 hover:scale-[1.02]">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('user.resume.destroy', $resume->id) }}" method="POST" class="flex-1"
                            onsubmit="return confirm('Are you sure you want to delete this resume?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full bg-red-600/80 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-all duration-300 hover:scale-[1.02]">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-xl p-8 text-center">
                        <div class="text-6xl mb-4">📝</div>
                        <h3 class="text-xl text-white font-semibold mb-2">No Resumes Yet</h3>
                        <p class="text-gray-300 mb-6">Create your first resume to start applying for jobs!</p>
                        <a href="{{ route('user.resume.create') }}"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-all duration-300 hover:scale-[1.02] shadow-lg">
                            ➕ Create Resume
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        setTimeout(() => {
            const msg = document.getElementById('successMessage');
            if (msg) {
                msg.classList.add('opacity-0');
                setTimeout(() => msg.remove(), 500);
            }
        }, 5000);
    </script>
@endsection