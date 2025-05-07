


<nav x-data="{ open: false }" class="bg-gradient-to-b from-gray-900/95 to-black/95 border-b border-white/10 backdrop-blur-xl sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center py-4 px-6">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-2xl font-bold bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 bg-clip-text text-transparent hover:from-blue-300 hover:via-purple-400 hover:to-pink-400 transition-all duration-500 hover:scale-105">
            Job Portal
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden lg:flex items-center space-x-8">
            <a href="{{ route('jobs.index') }}" class="text-gray-300 hover:text-blue-400 transition-all duration-300 relative group
                {{ request()->routeIs('jobs.*') ? 'text-blue-400' : '' }}">
                Jobs
                <span class="absolute -bottom-1 left-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-500 transition-all duration-300 
                    {{ request()->routeIs('jobs.*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
            </a>
            <a href="{{ route('career') }}" class="text-gray-300 hover:text-blue-400 transition-all duration-300 relative group
                {{ request()->routeIs('career') ? 'text-blue-400' : '' }}">
                Career
                <span class="absolute -bottom-1 left-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-500 transition-all duration-300 
                    {{ request()->routeIs('career') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
            </a>
            <a href="{{ route('salaries') }}" class="text-gray-300 hover:text-blue-400 transition-all duration-300 relative group
                {{ request()->routeIs('salaries') ? 'text-blue-400' : '' }}">
                Salaries
                <span class="absolute -bottom-1 left-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-500 transition-all duration-300 
                    {{ request()->routeIs('salaries') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
            </a>
            <a href="{{ route('companies') }}" class="text-gray-300 hover:text-blue-400 transition-all duration-300 relative group
                {{ request()->routeIs('companies') ? 'text-blue-400' : '' }}">
                Companies
                <span class="absolute -bottom-1 left-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-500 transition-all duration-300 
                    {{ request()->routeIs('companies') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
            </a>
        </div>
        
        <!-- Desktop Auth -->
        <div class="hidden lg:flex items-center space-x-4">
            @auth
                <div class="hidden md:flex items-center space-x-4">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 text-white font-medium bg-white/10 backdrop-blur-md rounded-xl border border-white/20 hover:bg-white/20 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/20">
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
                                <x-dropdown-link :href="route('employer.profile.edit')" class="hover:bg-blue-500/10 transition-all duration-300">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('employer.home')" class="hover:bg-blue-500/10 transition-all duration-300">
                                    {{ __('Employer Dashboard') }}
                                </x-dropdown-link>

                            @elseif (Auth::user()->isAdmin())
                                <x-dropdown-link :href="route('admin.profile.edit')" class="hover:bg-blue-500/10 transition-all duration-300">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('admin.home')" class="hover:bg-blue-500/10 transition-all duration-300">
                                    {{ __('Admin Dashboard') }}
                                </x-dropdown-link>
                            @else
                                <x-dropdown-link :href="route('profile.edit')" class="hover:bg-blue-500/10 transition-all duration-300">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('user.home')" class="hover:bg-blue-500/10 transition-all duration-300">
                                    {{ __('User Dashboard') }}
                                </x-dropdown-link>
                            @endif

                            <!-- Language Toggle AR / EN -->
                            {{-- <div class="flex items-center justify-center gap-2 mt-2 px-2 py-1 rounded-lg bg-white/5 backdrop-blur-md">
                                <a href="{{ route('lang.switch', 'ar') }}" class="text-sm transition-all duration-300 px-2 py-1 rounded 
                                    {{ app()->getLocale() === 'ar' ? 'text-blue-400 font-bold bg-white/10' : 'text-white hover:text-blue-200 hover:bg-white/5' }}">
                                    AR
                                </a>
                                <span class="text-white/40">/</span>
                                <a href="{{ route('lang.switch', 'en') }}" class="text-sm transition-all duration-300 px-2 py-1 rounded 
                                    {{ app()->getLocale() === 'en' ? 'text-blue-400 font-bold bg-white/10' : 'text-white hover:text-blue-200 hover:bg-white/5' }}">
                                    EN
                                </a>
                            </div> --}}

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-red-400 hover:bg-red-500/10 transition-all duration-300">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

            @else
                <!-- Language Dropdown -->
                {{-- <div x-data="{ open: false }" class="relative inline-block text-left">
                    <button @click="open = !open"
                        class="inline-flex items-center px-3 py-1 border border-white/20 text-white text-sm rounded-xl backdrop-blur-md bg-white/10 hover:bg-white/20 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/20">
                        {{ strtoupper(app()->getLocale()) }}
                        <svg class="ml-1 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 8l4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.away="open = false" x-transition class="origin-top-right absolute right-0 mt-2 w-28 rounded-xl shadow-lg z-50
                        backdrop-blur-xl bg-white/10 border border-white/20">
                        <div class="py-1 text-sm text-white">
                            <a href="{{ route('lang.switch', 'en') }}" class="block px-4 py-2 rounded transition-all duration-300 hover:bg-white/20 
                                {{ app()->getLocale() === 'en' ? 'font-bold text-blue-400' : '' }}">
                                EN
                            </a>
                            <a href="{{ route('lang.switch', 'ar') }}" class="block px-4 py-2 rounded transition-all duration-300 hover:bg-white/20 
                                {{ app()->getLocale() === 'ar' ? 'font-bold text-blue-400' : '' }}">
                                AR
                            </a>
                        </div>
                    </div>
                </div> --}}

                <!-- Guest Login/Register -->
                <a href="{{ route('login') }}"
                    class="px-4 py-2 border border-white/20 text-white rounded-xl hover:text-blue-300 hover:border-blue-400 transition-all duration-300 bg-white/10 backdrop-blur-md hover:bg-white/20 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/20">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 border border-white/20 text-white rounded-xl hover:text-green-300 hover:border-green-400 transition-all duration-300 bg-white/10 backdrop-blur-md hover:bg-white/20 hover:scale-105 hover:shadow-lg hover:shadow-green-500/20">
                    Register
                </a>
            @endauth
        </div>

        <!-- Mobile Toggle Button -->
        <button @click="open = !open" class="lg:hidden text-white focus:outline-none z-50 relative hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/20"
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

    <!-- Mobile Menu -->
    <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="fixed top-16 left-4 right-4 z-50 rounded-2xl bg-black/80 backdrop-blur-xl border border-white/20 shadow-xl px-6 py-4 space-y-3 lg:hidden">

        <a href="{{ route('jobs.index') }}" class="block text-white hover:text-blue-400 transition-all duration-300 hover:scale-105 hover:bg-white/5 px-3 py-2 rounded-lg
            {{ request()->routeIs('jobs.*') ? 'text-blue-400 font-semibold bg-white/5' : '' }}">Jobs</a>
        <a href="{{ route('career') }}" class="block text-white hover:text-blue-400 transition-all duration-300 hover:scale-105 hover:bg-white/5 px-3 py-2 rounded-lg
            {{ request()->routeIs('career') ? 'text-blue-400 font-semibold bg-white/5' : '' }}">Career</a>
        <a href="{{ route('salaries') }}" class="block text-white hover:text-blue-400 transition-all duration-300 hover:scale-105 hover:bg-white/5 px-3 py-2 rounded-lg
            {{ request()->routeIs('salaries') ? 'text-blue-400 font-semibold bg-white/5' : '' }}">Salaries</a>
        <a href="{{ route('companies') }}" class="block text-white hover:text-blue-400 transition-all duration-300 hover:scale-105 hover:bg-white/5 px-3 py-2 rounded-lg
            {{ request()->routeIs('companies') ? 'text-blue-400 font-semibold bg-white/5' : '' }}">Companies</a>
        
        {{-- <div class="flex items-center gap-2 px-2 py-1 rounded-xl backdrop-blur-md bg-white/5 border border-white/20">
            <a href="{{ route('lang.switch', 'en') }}" class="px-4 py-1 rounded text-sm font-semibold transition-all duration-300
                {{ app()->getLocale() === 'en' ? 'bg-blue-600 text-white shadow-sm' : 'bg-black/60 text-white hover:bg-white/20' }}">
                EN
            </a>
            <a href="{{ route('lang.switch', 'ar') }}" class="px-4 py-1 rounded text-sm font-semibold transition-all duration-300
                {{ app()->getLocale() === 'ar' ? 'bg-blue-600 text-white shadow-sm' : 'bg-black/60 text-white hover:bg-white/20' }}">
                AR
            </a>
        </div> --}}

        @auth
            <hr class="border-white/10 my-2">

            <!-- User Name -->
            <div class="text-white font-semibold bg-white/5 px-3 py-2 rounded-lg backdrop-blur-md">{{ Auth::user()->name }}</div>

            <!-- Dashboard link -->
            @if (Auth::user()->isEmployer())
                <a href="{{ route('employer.home') }}" class="block text-white hover:text-blue-400 transition-all duration-300 hover:scale-105 hover:bg-white/5 px-3 py-2 rounded-lg backdrop-blur-md">Employer Dashboard</a>
            @elseif (Auth::user()->isAdmin())
                <a href="{{ route('admin.home') }}" class="block text-white hover:text-purple-400 transition-all duration-300 hover:scale-105 hover:bg-white/5 px-3 py-2 rounded-lg backdrop-blur-md">Admin Dashboard</a>
            @else
                <a href="{{ route('user.home') }}" class="block text-white hover:text-green-400 transition-all duration-300 hover:scale-105 hover:bg-white/5 px-3 py-2 rounded-lg backdrop-blur-md">Dashboard</a>
            @endif

            <!-- Profile -->
            <a href="{{ route('profile.edit') }}" class="block text-blue-300 hover:text-blue-500 transition-all duration-300 hover:scale-105 hover:bg-white/5 px-3 py-2 rounded-lg backdrop-blur-md">Profile</a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left text-red-400 hover:text-red-500 transition-all duration-300 hover:scale-105 hover:bg-white/5 px-3 py-2 rounded-lg backdrop-blur-md">Logout</button>
            </form>
        @else
            <hr class="border-white/10 my-2">
            <a href="{{ route('login') }}" class="block text-white hover:text-blue-400 transition-all duration-300 hover:scale-105 hover:bg-white/5 px-3 py-2 rounded-lg backdrop-blur-md">Login</a>
            <a href="{{ route('register') }}" class="block text-white hover:text-green-400 transition-all duration-300 hover:scale-105 hover:bg-white/5 px-3 py-2 rounded-lg backdrop-blur-md">Register</a>
        @endauth
    </div>
</nav>