@extends('layouts.app')

@section('content')

    <!-- 🔘 Drawer Toggle Button (Visible < 1132px only) -->
    <button id="toggleSidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg lg-custom:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z" />
        </svg>
    </button>

    <!-- 📱 Overlay for small screens -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 hidden lg-custom:hidden"></div>

    <!-- 📂 Sidebar -->
    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform transform -translate-x-full lg-custom:translate-x-0
            bg-white/10 backdrop-blur-lg border-r border-white/20 shadow-xl text-white rounded-tr-3xl rounded-br-3xl"
        aria-label="Sidebar">

        <div class="h-full px-3 py-4 overflow-y-auto">
            <h2 class="text-2xl font-extrabold text-center mb-6 mt-4">Admin Dashboard</h2>

            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('admin.home') }}" class="flex items-center p-2 hover:bg-white/20 rounded-lg">
                        🏠 <span class="ms-3">Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.profile.edit') }}" class="flex items-center p-2 hover:bg-white/20 rounded-lg">
                        👤 <span class="ms-3">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.jobs') }}" class="flex items-center p-2 hover:bg-white/20 rounded-lg">
                        📋 <span class="ms-3">Job Management</span>
                    </a>
                </li>

            <!-- 🕒 Coming Soon - Smaller & Cleaner -->
            <li>
                <a href="#"
                    class="flex items-center justify-between p-2 rounded-lg text-white/50 cursor-not-allowed hover:bg-white/10 transition duration-200">
                    <div class="flex items-center gap-2">
                        👥 <span>User Management</span>
                    </div>
                    <span
                        class="text-[10px] font-medium bg-yellow-200 bg-opacity-80 text-black px-2 py-0 rounded-full shadow-sm tracking-tight">
                        Soon
                    </span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-between p-2 rounded-lg text-white/50 cursor-not-allowed hover:bg-white/10 transition duration-200">
                    <div class="flex items-center gap-2">
                        🏢 <span>Employer Management</span>
                    </div>
                    <span
                        class="text-[10px] font-medium bg-yellow-200 bg-opacity-80 text-black px-2 py-0 rounded-full shadow-sm tracking-tight">
                        Soon
                    </span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-between p-2 rounded-lg text-white/50 cursor-not-allowed hover:bg-white/10 transition duration-200">
                    <div class="flex items-center gap-2">
                        📄 <span>Applications Management</span>
                    </div>
                    <span
                        class="text-[10px] font-medium bg-yellow-200 bg-opacity-80 text-black px-2 py-0 rounded-full shadow-sm tracking-tight">
                        Soon
                    </span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-between p-2 rounded-lg text-white/50 cursor-not-allowed hover:bg-white/10 transition duration-200">
                    <div class="flex items-center gap-2">
                        📊 <span>Reports & Analytics</span>
                    </div>
                    <span
                        class="text-[10px] font-medium bg-yellow-200 bg-opacity-80 text-black px-2 py-0 rounded-full shadow-sm tracking-tight">
                        Soon
                    </span>
                </a>
            </li>


                <!-- Logout -->
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full p-2 hover:bg-red-500 rounded-lg">
                            🚪 <span class="ms-3">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    </aside>

    <!-- 🧱 Main Content Area -->
    <div class="p-4 lg-custom:ml-64 transition-all duration-300">
        <div class="p-4 rounded-lg dark:border-gray-700">
            <h1 class="text-3xl font-extrabold text-white mb-4">Welcome, {{ Auth::user()->name }}</h1>

            <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-6 rounded-lg shadow-lg">
                @yield('dashboard-content')
            </div>
        </div>
    </div>

    <!-- ✅ Sidebar JS Toggle -->
    <script>
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
    </script>

@endsection