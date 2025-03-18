@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-black bg-opacity-80 relative">
        <!-- Glassmorphism Background Effects -->
        <div
            class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-purple-600 via-blue-500 to-teal-400 opacity-50 rounded-full blur-3xl">
        </div>
        <div
            class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500 via-fuchsia-500 to-pink-500 opacity-50 rounded-full blur-3xl">
        </div>

        <!-- Form Container -->
        <div
            class="w-full max-w-3xl bg-white/10 backdrop-blur-xl border border-white/20 rounded-lg shadow-xl p-8 text-white">
            <h2 class="text-3xl font-extrabold text-center mb-6">Create Your Resume</h2>

            <form action="{{ route('resume.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Full Name -->
                <div class="relative">
                    <input type="text" name="full_name" required
                        class="peer w-full p-4 rounded-md bg-white/10 backdrop-blur-md border border-white/30 text-white placeholder-transparent 
                            focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition shadow-lg">
                    <label for="full_name" class="absolute left-4 top-4 text-gray-400 transition-all peer-placeholder-shown:opacity-0 
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-400">
                        Full Name
                    </label>
                </div>

                <!-- Phone -->
                <div class="relative">
                    <input type="text" name="phone" required
                        class="peer w-full p-4 rounded-md bg-white/10 backdrop-blur-md border border-white/30 text-white placeholder-transparent 
                            focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition shadow-lg">
                    <label for="phone" class="absolute left-4 top-4 text-gray-400 transition-all peer-placeholder-shown:opacity-0 
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-400">
                        Phone
                    </label>
                </div>

                <!-- Email -->
                <div class="relative">
                    <input type="email" name="email" required
                        class="peer w-full p-4 rounded-md bg-white/10 backdrop-blur-md border border-white/30 text-white placeholder-transparent 
                            focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition shadow-lg">
                    <label for="email" class="absolute left-4 top-4 text-gray-400 transition-all peer-placeholder-shown:opacity-0 
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-400">
                        Email
                    </label>
                </div>

                <!-- Address -->
                <div class="relative">
                    <input type="text" name="address"
                        class="peer w-full p-4 rounded-md bg-white/10 backdrop-blur-md border border-white/30 text-white placeholder-transparent 
                            focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition shadow-lg">
                    <label for="address" class="absolute left-4 top-4 text-gray-400 transition-all peer-placeholder-shown:opacity-0 
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-400">
                        Address
                    </label>
                </div>

                <!-- Skills -->
                <div class="relative">
                    <textarea name="skills"
                        class="peer w-full p-4 rounded-md bg-white/10 backdrop-blur-md border border-white/30 text-white placeholder-transparent 
                            focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition shadow-lg"></textarea>
                    <label for="skills" class="absolute left-4 top-4 text-gray-400 transition-all peer-placeholder-shown:opacity-0 
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-400">
                        Skills
                    </label>
                </div>

                <!-- Experience -->
                <div class="relative">
                    <textarea name="experience"
                        class="peer w-full p-4 rounded-md bg-white/10 backdrop-blur-md border border-white/30 text-white placeholder-transparent 
                            focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition shadow-lg"></textarea>
                    <label for="experience" class="absolute left-4 top-4 text-gray-400 transition-all peer-placeholder-shown:opacity-0 
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-400">
                        Experience
                    </label>
                </div>

                <!-- Education -->
                <div class="relative">
                    <textarea name="education"
                        class="peer w-full p-4 rounded-md bg-white/10 backdrop-blur-md border border-white/30 text-white placeholder-transparent 
                            focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition shadow-lg"></textarea>
                    <label for="education" class="absolute left-4 top-4 text-gray-400 transition-all peer-placeholder-shown:opacity-0 
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-400">
                        Education
                    </label>
                </div>

                <!-- Summary -->
                <div class="relative">
                    <textarea name="summary"
                        class="peer w-full p-4 rounded-md bg-white/10 backdrop-blur-md border border-white/30 text-white placeholder-transparent 
                            focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition shadow-lg"></textarea>
                    <label for="summary" class="absolute left-4 top-4 text-gray-400 transition-all peer-placeholder-shown:opacity-0 
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-400">
                        Summary
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition-all shadow-lg hover:scale-105">
                    Save Resume
                </button>
            </form>
        </div>
    </div>
@endsection