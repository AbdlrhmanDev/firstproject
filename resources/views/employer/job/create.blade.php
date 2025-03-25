@extends('employer.dashboard')

@section('dashboard-content')
    <div class="flex flex-col lg:flex-row gap-8 p-6  justify-center">

        {{-- Form Section --}}
        <div class="w-full lg:w-2/3 bg-white/10 p-6 rounded-xl shadow-lg border border-white/20 text-white">
            <h2 class="text-2xl font-bold mb-6">📝 Post a New Job</h2>

            <form action="{{ route('employer.job.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Job Title -->
                <div>
                    <label for="title" class="block mb-1 font-semibold">Job Title</label>
                    <input type="text" name="title" id="title" class="w-full p-3 rounded bg-white/5 border border-white/10"
                        required>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block mb-1 font-semibold">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full p-3 rounded bg-white/5 border border-white/10" required></textarea>
                </div>

                <!-- Salary -->
                <div>
                    <label for="salary" class="block mb-1 font-semibold">Salary (optional)</label>
                    <input type="number" name="salary" id="salary"
                        class="w-full p-3 rounded bg-white/5 border border-white/10">
                </div>

                <!-- Featured Toggle -->
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="featured" id="featured" class="accent-blue-500">
                    <label for="featured" class="text-sm">Mark as <span
                            class="text-yellow-400 font-semibold">Featured</span></label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-bold transition">
                        🚀 Post Job
                    </button>
                </div>
            </form>
        </div>

      
    </div>
@endsection