<section class="space-y-6">
    <header class="mb-6">
        
        <p class="mt-2 text-sm text-gray-300">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Current Password --}}
        <div>
            <label for="current_password" class="block text-sm font-medium text-gray-200 mb-2">Current Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input id="current_password" name="current_password" type="password" autocomplete="current-password"
                    class="pl-10 mt-1 block w-full bg-white/20 text-white border border-gray-500/30 rounded-lg px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" />
            </div>
            @error('current_password', 'updatePassword')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- New Password --}}
        <div>
            <label for="password" class="block text-sm font-medium text-gray-200 mb-2">New Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input id="password" name="password" type="password" autocomplete="new-password"
                    class="pl-10 mt-1 block w-full bg-white/20 text-white border border-gray-500/30 rounded-lg px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" />
            </div>
            @error('password', 'updatePassword')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-200 mb-2">Confirm Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                    class="pl-10 mt-1 block w-full bg-white/20 text-white border border-gray-500/30 rounded-lg px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" />
            </div>
            @error('password_confirmation', 'updatePassword')
                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit --}}
        <div class="flex items-center gap-4">
            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg shadow-lg transform transition-all hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm px-4 py-2 rounded-lg bg-green-500/10 text-green-300 border border-green-500/20 shadow-sm animate-fade-in">
                    Password updated successfully!
                </p>
            @endif
        </div>
    </form>
</section>