<section class="p-6 backdrop-blur-lg bg-white/10 dark:bg-white/5 border border-white/20 shadow-lg rounded-2xl">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-sm text-gray-300">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="mb-2">
            <div for="name" class="block text-sm font-medium text-gray-200 mb-1">
                {{ __('Name') }}
            </div>
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block w-full bg-white/20 text-white border border-gray-500/30 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('name')" />
        </div>


        <div class="mb-4">
            <div class="block text-sm font-medium text-gray-200 mb-1">
                {{ __('Email') }}
            </div>

            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full bg-white/20 text-white border border-gray-500/30 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                :value="old('email', $user->email)" required autocomplete="username" />

            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-300">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification"
                            class="ml-2 underline text-sm text-indigo-400 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-green-400 font-medium">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl shadow">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm px-3 py-1 rounded-md bg-green-500/10 text-green-300 border border-green-500/20 shadow-sm">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>

    </form>
</section>