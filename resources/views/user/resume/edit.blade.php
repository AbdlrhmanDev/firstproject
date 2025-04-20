@extends('dashboard')

@section('dashboard-content')
    <div class="flex items-center justify-center min-h-screen bg-opacity-80 relative">
        <!-- 🎨 Background Effects -->
        <div
            class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-purple-600 via-blue-500 to-teal-400 opacity-50 rounded-full blur-3xl">
        </div>
        <div
            class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500 via-fuchsia-500 to-pink-500 opacity-50 rounded-full blur-3xl">
        </div>

        <!-- 📝 Resume Edit Form -->
        <div
            class="w-full max-w-3xl bg-white/10 backdrop-blur-xl border border-white/20 rounded-lg shadow-xl p-8 text-white z-10">
            <h2 class="text-3xl font-extrabold text-center mb-6">Edit Your Resume</h2>

            <form action="{{ route('user.resume.update', $resume->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Full Name -->
                <div class="relative">
                    <input type="text" id="full_name" name="full_name" required
                        value="{{ old('full_name', $resume->full_name) }}"
                        class="peer w-full p-4 rounded-md bg-transparent border border-white/30 text-white placeholder-transparent focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition">
                    <label for="full_name"
                        class="absolute left-4 top-0 text-gray-400 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-500 peer-focus:top-0  peer-focus:text-sm peer-focus:text-blue-400">
                        Full Name
                    </label>
                    @error('full_name') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Phone -->
                <div class="relative">
                    <input type="text" id="phone" name="phone" required value="{{ old('phone', $resume->phone) }}"
                        class="peer w-full p-4 rounded-md bg-transparent border border-white/30 text-white placeholder-transparent focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition">
                    <label for="phone"
                        class="absolute left-4 top-0 text-gray-400 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-500 peer-focus:top-0  peer-focus:text-sm peer-focus:text-blue-400">
                        Phone
                    </label>
                    @error('phone') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div class="relative">
                    <input type="email" id="email" name="email" required value="{{ old('email', $resume->email) }}"
                        class="peer w-full p-4 rounded-md bg-transparent border border-white/30 text-white placeholder-transparent focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition">
                    <label for="email"
                        class="absolute left-4 top-0 text-gray-400 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-500 peer-focus:top-0  peer-focus:text-sm peer-focus:text-blue-400">
                        Email
                    </label>
                    @error('email') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Address -->
                <div class="relative">
                    <input type="text" id="address" name="address" value="{{ old('address', $resume->address) }}"
                        class="peer w-full p-4 rounded-md bg-transparent border border-white/30 text-white placeholder-transparent focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition">
                    <label for="address"
                        class="absolute left-4 top-0 text-gray-400 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-500 peer-focus:top-0  peer-focus:text-sm peer-focus:text-blue-400">
                        Address
                    </label>
                    @error('address') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Skills -->
                <div class="relative">
                    <textarea id="skills" name="skills"
                        class="peer w-full p-4  rounded-md bg-transparent border border-white/30 text-white placeholder-transparent focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition">{{ old('skills', $resume->skills) }}</textarea>
                    <label for="skills"
                        class="absolute left-4 top-0 pb-4 text-gray-400 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-500 peer-focus:top-0  peer-focus:text-sm peer-focus:text-blue-400">
                        Skills
                    </label>
                    @error('skills') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Experience -->
                <div class="relative">
                    <textarea id="experience" name="experience"
                        class="peer w-full p-4 rounded-md bg-transparent border border-white/30 text-white placeholder-transparent focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition">{{ old('experience', $resume->experience) }}</textarea>
                    <label for="experience"
                        class="absolute left-4 top-0 text-gray-400 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-500 peer-focus:top-0  peer-focus:text-sm peer-focus:text-blue-400">
                        Experience
                    </label>
                    @error('experience') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Education -->
                <div class="relative">
                    <textarea id="education" name="education"
                        class="peer w-full p-4 rounded-md bg-transparent border border-white/30 text-white placeholder-transparent focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition">{{ old('education', $resume->education) }}</textarea>
                    <label for="education"
                        class="absolute left-4 top-0 text-gray-400 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-500 peer-focus:top-0  peer-focus:text-sm peer-focus:text-blue-400">
                        Education
                    </label>
                    @error('education') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Summary -->
                <div class="relative">
                    <textarea id="summary" name="summary"
                        class="peer w-full p-4 rounded-md bg-transparent border border-white/30 text-white placeholder-transparent focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition">{{ old('summary', $resume->summary) }}</textarea>
                    <label for="summary"
                        class="absolute left-4 top-0 text-gray-400 transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-500 peer-focus:top-0  peer-focus:text-sm peer-focus:text-blue-400">
                        Summary
                    </label>
                    @error('summary') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition-all shadow-lg hover:scale-105">
                    Update Resume
                </button>
            </form>
        </div>
    </div>
@endsection