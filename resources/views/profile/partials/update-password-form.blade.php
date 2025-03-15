<div class="p-6 bg-gray-900 shadow sm:rounded-lg">
    <h3 class="text-lg font-semibold text-white">{{ __('Update Password') }}</h3>
    <p class="text-sm text-gray-400">Ensure your account is using a long, random password to stay secure.</p>

    <form method="POST" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('PATCH')

        <div>
            <label class="block text-gray-300" for="current_password">{{ __('Current Password') }}</label>
            <input type="password" name="current_password" id="current_password"
                class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                required>
        </div>

        <div class="mt-4">
            <label class="block text-gray-300" for="password">{{ __('New Password') }}</label>
            <input type="password" name="password" id="password"
                class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                required>
        </div>

        <div class="mt-4">
            <label class="block text-gray-300" for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                required>
        </div>

        <button type="submit"
            class="mt-4 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow">
            {{ __('Save') }}
        </button>
    </form>
</div>