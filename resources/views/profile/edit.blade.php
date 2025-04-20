{{-- @extends('dashboard') --}}
@php
    if (Auth::user()->isAdmin()) {
        $layout = 'admin';
    } elseif (Auth::user()->isEmployer()) {
        $layout = 'employer.dashboard';
    } else {
        $layout = 'dashboard'; // للمستخدم العادي
    }
@endphp

@extends($layout)

@section('dashboard-content')
    @if (session('status'))
        <div class="mb-6 text-center">
            <p class="px-4 py-3 rounded-lg bg-green-500/30 text-green-100 font-medium animate-fade-in">
                {{ session('status') }}
            </p>
        </div>
    @endif

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-white mb-4">Account Settings</h2>
                <p class="text-gray-300">Manage your account preferences and security</p>
            </div>

            <div class="grid gap-8">
                {{-- Profile Info --}}
                <div class="p-8 backdrop-blur-xl bg-white/10 border border-white/20 shadow-2xl rounded-3xl text-white transform transition-all hover:shadow-indigo-500/20">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="p-3 bg-indigo-500/20 rounded-xl">
                            <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold">Profile Information</h3>
                            <p class="text-gray-400 text-sm">Update your account details</p>
                        </div>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>

                {{-- Password Update --}}
                <div class="p-8 backdrop-blur-xl bg-white/10 border border-white/20 shadow-2xl rounded-3xl text-white transform transition-all hover:shadow-indigo-500/20">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="p-3 bg-indigo-500/20 rounded-xl">
                            <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold">Security</h3>
                            <p class="text-gray-400 text-sm">Update your password</p>
                        </div>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>

                {{-- Delete Account --}}
                <div class="p-8 backdrop-blur-xl bg-white/10 border border-white/20 shadow-2xl rounded-3xl text-white transform transition-all hover:shadow-red-500/20">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="p-3 bg-red-500/20 rounded-xl">
                            <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold">Delete Account</h3>
                            <p class="text-gray-400 text-sm">Permanently remove your account</p>
                        </div>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form[action*="user"]');
            if (form) {
                form.addEventListener('submit', function (e) {
                    if (!confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
                        e.preventDefault();
                    }
                });
            }
        });
    </script>
@endsection
