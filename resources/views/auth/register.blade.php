@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <section class="min-h-screen flex items-center justify-center relative py-12 ">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-12">
                <!-- Left Column (Image) -->
                <div class="hidden lg:block w-full max-w-md xl:max-w-lg transition-all duration-500 hover:scale-105">
                    <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="w-full drop-shadow-2xl rounded-2xl" alt="Register Illustration" />
                </div>

                <!-- Right Column (Registration Form) -->
                <div class="w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-md xl:max-w-lg opacity-0 transform translate-y-4 transition-all duration-1000" id="registerForm">
                    <div class="relative bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8 sm:p-10 shadow-2xl">
                        <h2 class="text-4xl font-bold text-white text-center mb-3 bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">Create Account ✨</h2>
                        <p class="text-center text-gray-300 mb-8 text-lg">Join our community today</p>

                        <!-- Social Registration Buttons -->
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <button type="button" class="flex items-center justify-center gap-3 bg-[#1877f2]/90 hover:bg-[#1877f2] p-4 rounded-xl shadow-lg transition-all duration-300 hover:scale-105 group">
                                <i class="fab fa-facebook-f text-white text-xl group-hover:animate-bounce"></i>
                                <span class="text-white font-medium">Facebook</span>
                            </button>
                            <button type="button" class="flex items-center justify-center gap-3 bg-[#ea4335]/90 hover:bg-[#ea4335] p-4 rounded-xl shadow-lg transition-all duration-300 hover:scale-105 group">
                                <i class="fab fa-google text-white text-xl group-hover:animate-bounce"></i>
                                <span class="text-white font-medium">Google</span>
                            </button>
                            <button type="button" class="flex items-center justify-center gap-3 bg-gray-900/90 hover:bg-gray-900 p-4 rounded-xl shadow-lg transition-all duration-300 hover:scale-105 group">
                                <i class="fab fa-github text-white text-xl group-hover:animate-bounce"></i>
                                <span class="text-white font-medium">GitHub</span>
                            </button>
                            <button type="button" class="flex items-center justify-center gap-3 bg-[#0a66c2]/90 hover:bg-[#0a66c2] p-4 rounded-xl shadow-lg transition-all duration-300 hover:scale-105 group">
                                <i class="fab fa-linkedin-in text-white text-xl group-hover:animate-bounce"></i>
                                <span class="text-white font-medium">LinkedIn</span>
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="flex items-center mb-8">
                            <hr class="flex-grow border-white/20">
                            <span class="px-4 text-gray-300 font-medium">or register with email</span>
                            <hr class="flex-grow border-white/20">
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="space-y-6">
                            @csrf

                            <!-- Full Name -->
                            <div class="relative group">
                                <input type="text" name="name" id="name" required autocomplete="name"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 transition-all duration-300 group-hover:bg-white/10"
                                    placeholder="Full Name" value="{{ old('name') }}">
                                <label for="name"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Full Name
                                </label>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email -->
                            <div class="relative group">
                                <input type="email" name="email" id="email" required autocomplete="username"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 transition-all duration-300 group-hover:bg-white/10"
                                    placeholder="Email" value="{{ old('email') }}">
                                <label for="email"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Email Address
                                </label>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="relative group">
                                <input type="password" name="password" id="password" required autocomplete="new-password"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 transition-all duration-300 group-hover:bg-white/10"
                                    placeholder="Password">
                                <label for="password"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Password
                                </label>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="relative group">
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 transition-all duration-300 group-hover:bg-white/10"
                                    placeholder="Confirm Password">
                                <label for="password_confirmation"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Confirm Password
                                </label>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <!-- Role Selection -->
                            <div class="relative group">
                                <select name="role" id="role" required
                                    class="peer w-full p-4 pr-10 rounded-xl bg-white/5 border border-white/20 text-white focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 transition-all duration-300 appearance-none cursor-pointer group-hover:bg-white/10">
                                    <option value="user" class="bg-gray-900">👤 Job Seeker</option>
                                    <option value="employer" class="bg-gray-900">🏢 Employer</option>
                                    <option value="admin" class="bg-gray-900">⚡ Administrator</option>
                                </select>
                                <label for="role"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2">
                                    I want to join as
                                </label>
                                <!-- Custom Select Arrow -->
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-400 transition-transform duration-300 peer-focus:text-blue-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Company Name (For Employers) -->
                            <div class="relative group" id="companyNameField" style="display: none;">
                                <input type="text" name="company_name" id="company_name"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 transition-all duration-300 group-hover:bg-white/10"
                                    placeholder="Company Name">
                                <label for="company_name"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Company Name
                                </label>
                            </div>

                            <!-- Register Button -->
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-500 via-blue-600 to-purple-600 text-white font-medium py-4 px-4 rounded-xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl hover:from-blue-600 hover:via-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500/25 active:scale-[0.98]">
                                Create Account
                            </button>

                            <!-- Login Link -->
                            <p class="text-center text-gray-300">
                                Already have an account?
                                <a href="{{ route('login') }}"
                                    class="text-blue-400 hover:text-blue-300 transition-colors font-medium">
                                    Sign in instead
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registerForm = document.getElementById('registerForm');
            setTimeout(() => {
                registerForm.classList.remove('opacity-0', 'translate-y-4');
            }, 100);

            const roleSelect = document.getElementById('role');
            const companyField = document.getElementById('companyNameField');

            function toggleCompanyField() {
                if (roleSelect.value === 'employer') {
                    companyField.style.display = 'block';
                } else {
                    companyField.style.display = 'none';
                }
            }

            // Show/hide on page load and on change
            toggleCompanyField();
            roleSelect.addEventListener('change', toggleCompanyField);
        });
    </script>
@endsection