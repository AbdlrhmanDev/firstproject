@extends('dashboard')

@section('dashboard-content')
    <div class="flex items-center justify-center min-h-screen bg-opacity-80 relative">

        <!-- 🎨 Background Blur Effects -->
        <div
            class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-purple-600 via-blue-500 to-teal-400 opacity-50 rounded-full blur-3xl">
        </div>
        <div
            class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500 via-fuchsia-500 to-pink-500 opacity-50 rounded-full blur-3xl">
        </div>

        <!-- 🧾 Resume Card -->
        <div
            class="w-full max-w-3xl bg-white/10 backdrop-blur-xl border border-white/20 rounded-lg shadow-xl p-8 text-white z-10">
            <h2 class="text-3xl font-extrabold text-center mb-6">🧾 Resume Details</h2>

            <div class="space-y-4">
                <p><strong class="text-blue-400">👤 Name:</strong> {{ $resume->full_name }}</p>
                <p><strong class="text-blue-400">📞 Phone:</strong> {{ $resume->phone }}</p>
                <p><strong class="text-blue-400">📧 Email:</strong> {{ $resume->email }}</p>
                <p><strong class="text-blue-400">🏠 Address:</strong> {{ $resume->address }}</p>
                <p><strong class="text-blue-400">🛠 Skills:</strong>
                    <span class="whitespace-pre-line">{{ $resume->skills }}</span>
                </p>
                <p><strong class="text-blue-400">💼 Experience:</strong>
                    <span class="whitespace-pre-line">{{ $resume->experience }}</span>
                </p>
                <p><strong class="text-blue-400">🎓 Education:</strong>
                    <span class="whitespace-pre-line">{{ $resume->education }}</span>
                </p>
                <p><strong class="text-blue-400">📝 Summary:</strong>
                    <span class="whitespace-pre-line">{{ $resume->summary }}</span>
                </p>
            </div>

            <!-- 🔘 Action Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mt-8">
                <!-- ✏️ Edit -->
                <a href="{{ route('user.resume.edit', $resume->id) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-md transition-all shadow-lg hover:scale-105">
                    ✏️ Edit Resume
                </a>

                <!-- 🔙 Back -->
                <a href="{{ route('user.resume.index') }}"
                    class="bg-white/10 hover:bg-white/20 text-white border border-white/30 px-6 py-3 rounded-md transition-all shadow-lg hover:scale-105">
                    🔙 Back to Resumes
                </a>
            </div>

            <!-- ⏱ Last Updated (Optional) -->
            <p class="text-sm text-gray-300 text-center mt-6">
                Last updated: {{ $resume->updated_at->format('F j, Y g:i A') }}
            </p>
        </div>
    </div>
@endsection