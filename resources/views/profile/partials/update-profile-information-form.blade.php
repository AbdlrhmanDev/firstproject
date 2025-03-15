<div class="p-6 bg-gray-900 shadow sm:rounded-lg">
    <h3 class="text-lg font-semibold text-white">{{ __('Profile Information') }}</h3>
    <p class="text-sm text-gray-400">Update your account's profile information and email address.</p>

    <form method="POST" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('PATCH')

        <div>
            <label class="block text-gray-300" for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"
                class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                required>
        </div>

        <div class="mt-4">
            <label class="block text-gray-300" for="email">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                required>
        </div>

        <button type="submit"
            class="mt-4 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow">
            {{ __('Save') }}
        </button>
    </form>
</div>