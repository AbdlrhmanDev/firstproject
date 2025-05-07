@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <section class="min-h-screen flex items-center justify-center relative py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-12">
                <!-- Left Column (Image) -->
                <div class="hidden lg:block w-full max-w-md xl:max-w-lg transition-all duration-500 hover:scale-105">
                    <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="w-full drop-shadow-2xl rounded-2xl" alt="Login Illustration" />
                </div>

                <!-- Right Column (Login Form) -->
                <div class="w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-md xl:max-w-lg opacity-0 transform translate-y-4 transition-all duration-1000" id="loginForm">
                    <div class="relative bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8 sm:p-10 shadow-2xl">
                        <h2 class="text-4xl font-bold text-white text-center mb-3 bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">Welcome Back ✨</h2>
                        <p class="text-center text-gray-300 mb-8 text-lg">Login to your account</p>

                        <!-- Social Login Buttons -->
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
                            <span class="px-4 text-gray-300 font-medium">or login with email</span>
                            <hr class="flex-grow border-white/20">
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf

                            <!-- Email -->
                            <div class="relative group">
                                <input type="email" name="email" id="email"  autocomplete="username"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 transition-all duration-300 group-hover:bg-white/10 @error('email') border-red-500/50 focus:border-red-500/50 focus:ring-red-500/25 @enderror"
                                    placeholder="Email" value="{{ old('email') }}">
                                <label for="email"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900 @error('email') text-red-400 peer-focus:text-red-400 @enderror">
                                    Email Address
                                </label>
                                @error('email')
                                    <div class="mt-2 flex items-center text-red-400">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-sm">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="relative group">
                                <input type="password" name="password" id="password"  autocomplete="current-password"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 transition-all duration-300 group-hover:bg-white/10 @error('password') border-red-500/50 focus:border-red-500/50 focus:ring-red-500/25 @enderror"
                                    placeholder="Password">
                                <label for="password"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900 @error('password') text-red-400 peer-focus:text-red-400 @enderror">
                                    Password
                                </label>
                                @error('password')
                                    <div class="mt-2 flex items-center text-red-400">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-sm">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- General Error Message -->
                            @if ($errors->any())
                                <div class="bg-red-500/10 border border-red-500/50 rounded-xl p-4 mb-6">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-red-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        <div>
                                            <h3 class="text-sm font-medium text-red-400">Login Failed</h3>
                                            <div class="mt-1 text-sm text-red-300">
                                                <ul class="list-disc list-inside">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Remember Me & Forgot Password -->
                            <div class="flex justify-between items-center">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="remember" class="form-checkbox text-blue-500 bg-transparent border-white/20 rounded focus:ring-blue-500/25">
                                    <span class="ml-2 text-gray-300">Remember Me</span>
                                </label>
                                <a href="{{ route('password.request') }}" class="text-sm text-blue-400 hover:text-blue-300 transition-colors">
                                    Forgot Password?
                                </a>
                            </div>

                            <!-- Login Button -->
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-500 via-blue-600 to-purple-600 text-white font-medium py-4 px-4 rounded-xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl hover:from-blue-600 hover:via-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500/25 active:scale-[0.98]">
                                Login
                            </button>

                            <!-- Register Link -->
                            <p class="text-center text-gray-300">
                                Don't have an account?
                                <a href="{{ route('register') }}"
                                    class="text-blue-400 hover:text-blue-300 transition-colors font-medium">
                                    Register now
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
            const loginForm = document.getElementById('loginForm');
            setTimeout(() => {
                loginForm.classList.remove('opacity-0', 'translate-y-4');
            }, 100);
        });
    </script>
@endsection