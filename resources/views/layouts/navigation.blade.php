<nav x-data="{ open: false }" class="bg-gray-900 border-b border-gray-700">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-xl font-bold text-white">
            Job Portal
        </a>

        <!-- Desktop Navigation Links -->
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('jobs.index') }}" class="text-white hover:text-gray-400 transition duration-200">Jobs</a>
            <a href="{{ route('career') }}" class="text-white hover:text-gray-400 transition duration-200">Career</a>
            <a href="{{ route('salaries') }}"
                class="text-white hover:text-gray-400 transition duration-200">Salaries</a>
            <a href="{{ route('companies') }}"
                class="text-white hover:text-gray-400 transition duration-200">Companies</a>
        </div>

        <!-- User Authentication & Settings -->
        <div class="hidden md:flex items-center space-x-4">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-white font-medium">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('dashboard')">
                            {{ __('Dashboard') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <a href="{{ route('login') }}"
                    class=" backdrop-blur-md backdrop-saturate-200 px-4 py-2 rounded-xl text-white font-semibold  shadow-lg border border-white/20 transition-all duration-300 hover:scale-105 hover:border-blue-400 hover:text-blue-300">
                    Login</a>
                <a href="{{ route('register') }}"
                    class=" backdrop-blur-md backdrop-saturate-200 px-4 py-2 rounded-xl text-white font-semibold  shadow-lg border border-white/20 transition-all duration-300 hover:scale-105 hover:border-green-400 hover:text-green-300">
                    Register</a>
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <button @click="open = !open" class="md:hidden text-white focus:outline-none">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="md:hidden bg-gray-800 p-4 space-y-2 rounded-lg">
        <a href="{{ route('jobs.index') }}" class="block text-white hover:text-gray-400 transition">Jobs</a>
        <a href="{{ route('career') }}" class="block text-white hover:text-gray-400 transition">Career</a>
        <a href="{{ route('salaries') }}" class="block text-white hover:text-gray-400 transition">Salaries</a>
        <a href="{{ route('companies') }}" class="block text-white hover:text-gray-400 transition">Companies</a>

        @auth
            <a href="{{ route('profile.edit') }}" class="block text-blue-400 hover:text-blue-500 transition">Profile</a>
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="block text-red-400 hover:text-red-500 transition">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block text-white hover:text-gray-400 transition">Login</a>
            <a href="{{ route('register') }}" class="block text-white hover:text-gray-400 transition">Register</a>
        @endauth
    </div>
</nav>