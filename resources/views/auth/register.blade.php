{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />

        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        {{-- <!-- Role Selection -->
        <div>
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="user">User</option>
                <option value="employer">Employer</option>
            </select>
        </div> --}}

        {{-- <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <section class="min-h-screen flex items-center justify-center bg-black bg-opacity-80 relative">
        <!-- Background Glassmorphism Effects -->
        <div
            class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-purple-600 via-blue-500 to-teal-400 opacity-50 rounded-full blur-3xl pointer-events-none">
        </div>
        <div
            class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500 via-fuchsia-500 to-pink-500 opacity-50 rounded-full blur-3xl pointer-events-none">
        </div>

        <div class="container mx-auto px-6 py-10">
            <div class="flex flex-col md:flex-row items-center justify-center">
                <!-- Left Column (Image) -->
                <div class="hidden md:block md:w-6/12">
                    <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="w-full opacity-90" alt="Register Illustration" />
                </div>

                <!-- Right Column (Registration Form) -->
                <div
                    class="w-full md:w-5/12 bg-white/10 backdrop-blur-xl border border-white/20 rounded-lg shadow-xl p-8 text-white relative z-10">
                    <h2 class="text-3xl font-extrabold text-center">Create Your Account</h2>
                    <p class="text-center text-gray-300 mb-6">Sign up to start applying for jobs</p>

                    <form class="mt-6" method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Full Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-300 text-sm font-semibold">Full Name</label>
                            <input id="name" type="text" name="name" required autocomplete="name"
                                class="w-full mt-1 p-3 bg-transparent border border-white/30 text-white rounded-md focus:outline-none focus:border-blue-400 transition">
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-300 text-sm font-semibold">Email</label>
                            <input id="email" type="email" name="email" required autocomplete="username"
                                class="w-full mt-1 p-3 bg-transparent border border-white/30 text-white rounded-md focus:outline-none focus:border-blue-400 transition">
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-300 text-sm font-semibold">Phone Number</label>
                            <input id="phone" type="text" name="phone" required autocomplete="tel"
                                class="w-full mt-1 p-3 bg-transparent border border-white/30 text-white rounded-md focus:outline-none focus:border-blue-400 transition">
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-gray-300 text-sm font-semibold">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                class="w-full mt-1 p-3 bg-transparent border border-white/30 text-white rounded-md focus:outline-none focus:border-blue-400 transition">
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-300 text-sm font-semibold">Confirm
                                Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                autocomplete="new-password"
                                class="w-full mt-1 p-3 bg-transparent border border-white/30 text-white rounded-md focus:outline-none focus:border-blue-400 transition">
                        </div>

                        <!-- Role Selection -->
                        <div class="mb-4">
                            <label for="role" class="block text-gray-300 text-sm font-semibold">Select Role</label>
                            <select id="role" name="role" required
                                class="w-full mt-1 p-3 bg-transparent border border-white/30 text-white rounded-md focus:outline-none focus:border-blue-400 transition">
                                <option value="user">User</option>
                                <option value="employer">Employer</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <!-- Register Button -->
                        <button
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition-all shadow-lg hover:scale-105">
                            Register
                        </button>

                        <!-- Already Registered -->
                        <p class="mt-6 text-center text-gray-300">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-500 transition">
                                Login here!
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection