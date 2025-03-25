<section class="p-6 backdrop-blur-lg bg-white/10 dark:bg-white/5 border border-white/20 shadow-lg rounded-2xl">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm text-gray-300">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')
        {{-- Current Password --}}
        <div class="mb-4">
            <div class="block text-sm font-medium text-gray-200 mb-1">
                {{ __('Current Password') }}
            </div>

            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full bg-white/20 text-white border border-gray-500/30 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                autocomplete="current-password" />

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-400" />
        </div>

        {{-- update_password_password --}}
        <div class="mb-4">
            <div class="block text-sm font-medium text-gray-200 mb-1">
                {{ __('New Password') }}
            </div>

            <x-text-input id="update_password_password" name="password" type="password"
                class="mt-1 block w-full bg-white/20 text-white border border-gray-500/30 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                autocomplete="new-password" />

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-400" />
        </div>

        {{-- update_password_password_confirmation --}}
    <div class="mb-4">
        <div class="block text-sm font-medium text-gray-200 mb-1">
            {{ __('Confirm Password') }}
        </div>
    
        <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
            class="mt-1 block w-full bg-white/20 text-white border border-gray-500/30 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
            autocomplete="new-password" />
    
        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-400" />
    </div>

        {{-- Save --}}
    <div class="flex items-center gap-4">
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl shadow">
            {{ __('Save') }}
        </x-primary-button>
    
        @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm px-3 py-1 rounded-md bg-green-500/10 text-green-300 border border-green-500/20 shadow-sm">
                {{ __('Saved.') }}
            </p>
        @endif
    </div>

    </form>
</section>