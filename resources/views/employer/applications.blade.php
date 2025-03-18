{{-- @extends('layouts.app')

@section('content')
    <div class="flex h-screen bg-black bg-opacity-80">
        <div id="sidebar"
            class="w-64 bg-white/10 backdrop-blur-lg border-r border-white/20 shadow-xl p-5 text-white transition-transform duration-300 transform md:translate-x-0 -translate-x-full fixed md:relative h-full">
            <h2 class="text-2xl font-extrabold text-center mb-6">Employer Dashboard</h2>

            <nav class="space-y-4">
                <a href="{{ route('employer.dashboard') }}" class="block p-3 rounded-lg hover:bg-white/20 transition">🏠
                    Home</a>
                <a href="{{ route('jobs.index') }}" class="block p-3 rounded-lg hover:bg-white/20 transition">📋 Manage
                    Jobs</a>
                <a href="{{ route('applications.index') }}" class="block p-3 rounded-lg hover:bg-white/20 transition">📨
                    Applications</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left p-3 rounded-lg hover:bg-red-500 transition">🚪
                        Logout</button>
                </form>
            </nav>
        </div>

        <div class="flex-1 p-8">
            <button id="toggleSidebar" class="md:hidden bg-blue-500 px-4 py-2 rounded-lg mb-4 text-white">☰ Menu</button>

            <h1 class="text-3xl font-extrabold text-white mb-4">Welcome, Employer!</h1>

            <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-6 rounded-lg shadow-lg">
                @yield('dashboard-content')
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        });
    </script>
@endsection --}}