@extends('layouts.app')

@section('content')

    <!-- 🔘 Drawer Toggle Button (Mobile) -->
    <button id="toggleSidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden m hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <!-- 📱 Overlay for small screens -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 hidden sm:hidden"></div>

    <!-- 📂 Sidebar -->
    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform transform -translate-x-full sm:translate-x-0
            bg-white/10 backdrop-blur-lg border-r border-white/20 shadow-xl text-white rounded-tr-3xl rounded-br-3xl"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto">
            <h2 class="text-2xl font-extrabold text-center mb-6 mt-4">User Dashboard</h2>
            <ul class="space-y-2 font-medium">
                <li><a href="{{ route('user.home') }}" class="flex items-center p-2 hover:bg-white/20 rounded-lg">🏠 <span
                            class="ms-3">Home</span></a></li>
                <li><a href="{{ route('profile.edit') }}" class="flex items-center p-2 hover:bg-white/20 rounded-lg">👤
                        <span class="ms-3">Profile</span></a></li>
                <li><a href="{{ route('user.resume.index') }}" class="flex items-center p-2 hover:bg-white/20 rounded-lg">📄
                        <span class="ms-3">Resume</span></a></li>
                <li><a href="{{ route('user.orders') }}" class="flex items-center p-2 hover:bg-white/20 rounded-lg">📦 <span
                            class="ms-3">Orders</span></a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full p-2 hover:bg-red-500 rounded-lg">🚪 <span
                                class="ms-3">Logout</span></button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <!-- 🧱 Main Content Area -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700">
            <h1 class="text-3xl font-extrabold text-white mb-4">
                Welcome, {{ Auth::user()->name }}
            </h1>

            <!-- 🔲 Content Card -->
            <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-6 rounded-lg shadow-lg">
                @yield('dashboard-content')
            </div>
        </div>
    </div>

    <!-- ✅ Sidebar JS Toggle -->
    {{-- <script>
        const sidebar = document.getElementById('default-sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');
        const overlay = document.getElementById('sidebar-overlay');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script> --}}

@endsection