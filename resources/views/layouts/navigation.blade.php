{{-- <nav x-data="{ open: false }" class="bg-gray-900 border-b border-gray-700">
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
                    @if (Auth::user()->isEmployer())
                    <x-dropdown-link :href="route('employer.home')">
                        {{ __('Employer Dashboard') }}
                    </x-dropdown-link>

                    @elseif (Auth::user()->isAdmin())
                    <x-dropdown-link :href="route('admin.home')">
                        {{ __('Admin Dashboard') }}
                    </x-dropdown-link>
                    @else
                    <x-dropdown-link :href="route('dashboard')">
                        {{ __('Dashboard') }}
                    </x-dropdown-link>
                    @endif

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
</nav> --}}


<nav x-data="{ open: false }" class="bg-gray-900 border-b border-gray-700 relative z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center py-4 px-6">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-xl font-bold text-white">Job Portal</a>

        <!-- Desktop Navigation -->
        <div class="hidden lg:flex items-center space-x-6">
            <a href="{{ route('jobs.index') }}" class="text-white hover:text-gray-400">Jobs</a>
            <a href="{{ route('career') }}" class="text-white hover:text-gray-400">Career</a>
            <a href="{{ route('salaries') }}" class="text-white hover:text-gray-400">Salaries</a>
            <a href="{{ route('companies') }}" class="text-white hover:text-gray-400">Companies</a>
        </div>

        <!-- Desktop Auth -->
        <div class="hidden lg:flex items-center space-x-4">
            @auth
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

                                @if (Auth::user()->isEmployer())
                                    <x-dropdown-link :href="route('employer.profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('employer.home')">
                                        {{ __('Employer Dashboard') }}
                                    </x-dropdown-link>

                                @elseif (Auth::user()->isAdmin())
                                    <x-dropdown-link :href="route('admin.profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('admin.home')">
                                        {{ __('Admin Dashboard') }}
                                    </x-dropdown-link>
                                @else
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                @endif

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

            @else
                <a href="{{ route('login') }}"
                    class="px-4 py-2 border border-white/20 text-white rounded-lg hover:text-blue-300 hover:border-blue-400 transition">Login</a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 border border-white/20 text-white rounded-lg hover:text-green-300 hover:border-green-400 transition">Register</a>
            @endauth
        </div>

        <!-- Mobile Toggle Button -->
        <button @click="open = !open" class="lg:hidden text-white focus:outline-none z-50 relative"
            aria-label="Toggle Menu">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Overlay Background -->
    <div x-show="open" x-cloak class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 transition-opacity duration-300"
        @click="open = false">
    </div>

    <!-- Mobile Menu (Glass-style Panel) -->
    <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="fixed top-16 left-4 right-4 z-50 rounded-2xl bg-white/10 backdrop-blur-lg border border-white/20 shadow-xl px-6 py-4 space-y-3 lg:hidden">

        <a href="{{ route('jobs.index') }}" class="block text-white hover:text-gray-300">Jobs</a>
        <a href="{{ route('career') }}" class="block text-white hover:text-gray-300">Career</a>
        <a href="{{ route('salaries') }}" class="block text-white hover:text-gray-300">Salaries</a>
        <a href="{{ route('companies') }}" class="block text-white hover:text-gray-300">Companies</a>

        @auth
            <hr class="border-white/10 my-2">

            <!-- User Name -->
            <div class="text-white font-semibold">{{ Auth::user()->name }}</div>

            <!-- Dashboard link -->
            @if (Auth::user()->isEmployer())
                <a href="{{ route('employer.home') }}" class="block text-white hover:text-blue-400">Employer Dashboard</a>
            @elseif (Auth::user()->isAdmin())
                <a href="{{ route('admin.home') }}" class="block text-white hover:text-purple-400">Admin Dashboard</a>
            @else
                <a href="{{ route('dashboard') }}" class="block text-white hover:text-green-400">Dashboard</a>
            @endif

            <!-- Profile -->
            <a href="{{ route('profile.edit') }}" class="block text-blue-300 hover:text-blue-500">Profile</a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block text-red-400 hover:text-red-500 mt-2">Logout</button>
            </form>
        @else
            <hr class="border-white/10 my-2">
            <a href="{{ route('login') }}" class="block text-white hover:text-gray-300">Login</a>
            <a href="{{ route('register') }}" class="block text-white hover:text-gray-300">Register</a>
        @endauth

    </div>
</nav>