@extends('employer.dashboard')

@section('dashboard-content')
    <div class="container mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold text-white mb-2">Manage Jobs</h2>
                <p class="text-gray-300">Create and manage your job listings</p>
            </div>
            <a href="{{ route('employer.job.create')}}"
                class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-xl hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center gap-2">
                <span>➕</span>
                <span>Add New Job</span>
            </a>
        </div>

        <!-- Jobs Table -->
        <div class="bg-white/10 backdrop-blur-lg rounded-xl shadow-xl overflow-hidden border border-white/20">
            <table class="w-full">
                <thead>
                    <tr class="bg-white/20">
                        <th class="p-4 text-left text-white font-semibold">Title</th>
                        <th class="p-4 text-left text-white font-semibold">Salary</th>
                        <th class="p-4 text-left text-white font-semibold">Featured</th>
                        <th class="p-4 text-left text-white font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr class="border-t border-white/10 hover:bg-white/5 transition-all duration-300">
                            <td class="p-4 text-white">{{ $job->title }}</td>
                            <td class="p-4 text-white">${{ number_format($job->salary, 2) }}</td>
                            <td class="p-4">
                                @if ($job->featured)
                                    <span class="px-3 py-1 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-full text-sm font-medium shadow-lg">Featured</span>
                                @else
                                    <span class="px-3 py-1 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-full text-sm font-medium shadow-lg">Regular</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('employer.job.edit', $job) }}"
                                        class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-amber-600 text-white rounded-lg hover:from-yellow-600 hover:to-amber-700 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center gap-2">
                                        <span>✏️</span>
                                        <span>Edit</span>
                                    </a>

                                    <form action="{{ route('employer.job.destroy', $job) }}" method="POST" class="inline-block"
                                        onsubmit="return confirm('Are you sure you want to delete this job?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="px-4 py-2 bg-gradient-to-r from-red-500 to-rose-600 text-white rounded-lg hover:from-red-600 hover:to-rose-700 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center gap-2">
                                            <span>🗑️</span>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection 