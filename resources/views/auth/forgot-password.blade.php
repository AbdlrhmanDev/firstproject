@extends('layouts.app')
<div class="min-h-screen flex items-center justify-center bg-black bg-opacity-80 relative px-4">
        {{-- Glass background bubbles --}}
        <div
            class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-purple-600 via-blue-500 to-teal-400 opacity-30 rounded-full blur-3xl">
        </div>
        <div
            class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500 via-fuchsia-500 to-pink-500 opacity-30 rounded-full blur-3xl">
        </div>

        {{-- Card --}}
        <div
            class="w-full max-w-lg bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-xl shadow-2xl p-8 z-10">
            <h2 class="text-2xl font-bold mb-6 text-center">🔒 Forgot Password</h2>

            <p class="text-sm text-white/70 mb-4 text-center">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            {{-- Session Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- Form --}}
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-white" />
                    <x-text-input id="email"
                        class="mt-1 block w-full bg-white/20 text-white border border-gray-400/30 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                        type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <div class="flex justify-center mt-6">
                    <x-primary-button
                        class="bg-indigo-600 hover:bg-indigo-700 px-6 py-2 rounded-lg shadow-md text-white font-semibold">
                        {{ __('📩 Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
