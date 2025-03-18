{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

            <div class="flex flex-col items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <a href="{{ route('register') }}" class="text-sm text-gray-400 mt-2 hover:text-white">
                Don't have an account? <span class="text-indigo-400 text-blue-500">Register now!</span>
            </a>
            

            <button
                class="text-center mt-4 w-full py-2 bg-white hover:bg-indigo-600 text-black font-semibold rounded-lg shadow-md ">

                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <section class="h-screen flex items-center justify-center bg-black bg-opacity-80 relative">
        <!-- Background Glassmorphism Effects -->
        <div
            class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-purple-600 via-blue-500 to-teal-400 opacity-50 rounded-full blur-3xl">
        </div>
        <div
            class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500 via-fuchsia-500 to-pink-500 opacity-50 rounded-full blur-3xl">
        </div>

        <div class="container mx-auto px-6 py-10">
            <div class="flex flex-col md:flex-row items-center justify-center">
                <!-- Left Column (Image) -->
                <div class="hidden md:block md:w-6/12">
                    <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="w-full opacity-90" alt="Login Illustration" />
                </div>

                <!-- Right Column (Login Form) -->
                <div
                    class="w-full md:w-5/12 bg-white/10 backdrop-blur-xl border border-white/20 rounded-lg shadow-xl p-8 text-white">
                    <h2 class="text-3xl font-extrabold text-center">Welcome Back</h2>
                    <p class="text-center text-gray-300 mb-6">Login to access your account</p>

                    <!-- Social Login Buttons -->
                    <div class="flex justify-center space-x-4 mb-6">
                        <button class="bg-blue-600 hover:bg-blue-700 transition-all p-3 rounded-full shadow-md">
                            <i class="fab fa-facebook-f text-white"></i>
                        </button>
                        <button class="bg-blue-400 hover:bg-blue-500 transition-all p-3 rounded-full shadow-md">
                            <i class="fab fa-twitter text-white"></i>
                        </button>
                        <button class="bg-red-500 hover:bg-red-600 transition-all p-3 rounded-full shadow-md">
                            <i class="fab fa-google text-white"></i>
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="flex items-center">
                        <hr class="flex-grow border-gray-500">
                        <span class="mx-3 text-gray-400">or</span>
                        <hr class="flex-grow border-gray-500">
                    </div>

                    <!-- Login Form -->
                    <form class="mt-6" method="POST" action="{{ route('login') }}">
                                @csrf

                        <!-- Email Input -->
                        <div class="relative mb-6">
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus
                                autocomplete="username" />
                                <x-input-label for="email" :value="__('Email')" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />


                        </div>

                        <!-- Password Input -->
                        <div class="relative mb-6">
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <x-input-label for="password" :value="__('Password')" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex justify-between items-center mb-6">
                            <label class="inline-flex items-center text-sm">
                                <input type="checkbox" class="form-checkbox text-blue-500 bg-transparent border-gray-400">
                                <span class="ml-2 text-gray-300">Remember Me</span>
                            </label>
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-400 hover:text-blue-500 transition">
                                Forgot Password?
                            </a>
                        </div>

                        <!-- Login Button -->
                        <button
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition-all shadow-lg hover:scale-105">
                            Login
                        </button>

                        <!-- Sign Up Link -->
                        <p class="mt-6 text-center text-gray-300">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-500 transition">
                                Register now!
                            </a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection