<div class="p-6 bg-gray-900 shadow sm:rounded-lg">
    <h3 class="text-lg font-semibold text-red-400">{{ __('Delete Account') }}</h3>
    <p class="text-sm text-gray-400">Once your account is deleted, all of its resources and data will be permanently
        deleted.</p>

    <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
        @csrf
        @method('DELETE')

        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow">
            {{ __('Delete Account') }}
        </button>
    </form>
</div>