<section class="space-y-6">
    <header class="mb-6">
       
        <p class="mt-2 text-sm text-gray-300">
            Update your account's profile information and email address.
        </p>
    </header>

    <!-- Update Profile Form -->
    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('PATCH')

        <!-- Hidden form for email verification -->
        <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
            @csrf
        </form>

        {{-- Name --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-200 mb-2">Name</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus
                    autocomplete="name"
                    class="pl-10 block w-full bg-white/10 text-white border border-gray-500/30 rounded-lg px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" />
            </div>
            @error('name')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-200 mb-2">Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                    autocomplete="username"
                    class="pl-10 block w-full bg-white/10 text-white border border-gray-500/30 rounded-lg px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" />
            </div>
            @error('email')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2 text-sm text-gray-300">
                    Your email address is unverified.
                    <button form="send-verification"
                        class="ml-2 underline text-indigo-400 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Click here to re-send the verification email.
                    </button>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm text-green-400 font-medium">
                        A new verification link has been sent to your email address.
                    </p>
                @endif
            @endif
        </div>

        {{-- Save Button + Flash --}}
        <div class="flex items-center gap-4">
            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg shadow-lg transform transition-all hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm px-4 py-2 rounded-lg bg-green-500/10 text-green-300 border border-green-500/20 shadow-sm animate-fade-in">
                    Changes saved successfully!
                </p>
            @endif
        </div>
    </form>
</section>