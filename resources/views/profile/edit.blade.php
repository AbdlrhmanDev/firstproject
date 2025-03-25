@extends('dashboard')

@section('dashboard-content')
    <div class="min-h-screen  py-12 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-white mb-10 text-center">👤 Manage Your Profile</h2>

        <div class="max-w-4xl mx-auto space-y-10">
            {{-- Profile Info --}}
            <div class="p-6 backdrop-blur-xl bg-white/10 border border-white/20 shadow-lg rounded-2xl text-white">
                <h3 class="text-2xl font-semibold mb-4">📝 Profile Information</h3>
                @include('profile.partials.update-profile-information-form')
            </div>

            {{-- Password Update --}}
            <div class="p-6 backdrop-blur-xl bg-white/10 border border-white/20 shadow-lg rounded-2xl text-white">
                <h3 class="text-2xl font-semibold mb-4">🔐 Update Password</h3>
                @include('profile.partials.update-password-form')
            </div>

            {{-- Delete --}}
            <div class="p-6 backdrop-blur-xl bg-white/10 border border-white/20 shadow-lg rounded-2xl text-white">
                <h3 class="text-2xl font-semibold mb-4">⚠️ Delete Account</h3>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
