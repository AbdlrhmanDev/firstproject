@extends('admin')

@section('dashboard-content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-white">📋 All Jobs Table</h2>
            <a href="{{ route('jobs.create') }}" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 shadow-lg">
                + Add New Job
            </a>
        </div>

        <div class="overflow-x-auto rounded-2xl shadow-2xl border border-white/10 backdrop-blur-md bg-gradient-to-br from-white/5 to-white/10">
            <table class="min-w-full text-sm text-white">
                <thead class="bg-gradient-to-r from-white/10 to-white/5 text-white/80 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold tracking-wider">Title</th>
                        <th class="px-6 py-4 text-left font-semibold tracking-wider">Salary</th>
                        <th class="px-6 py-4 text-left font-semibold tracking-wider">Company</th>
                        <th class="px-6 py-4 text-left font-semibold tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left font-semibold tracking-wider">Posted</th>
                        <th class="px-6 py-4 text-left font-semibold tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse($jobs as $job)
                        <tr class="hover:bg-white/10 transition-all duration-300 group">
                            <td class="px-6 py-4 font-medium">
                                <a href="{{ route('jobs.show', $job->id) }}" class="hover:text-blue-400 transition-colors duration-300 flex items-center gap-2">
                                    <span class="group-hover:translate-x-1 transition-transform duration-300">→</span>
                                    {{ $job->title }}
                                </a>
                            </td>
                            <td class="px-6 py-4">${{ number_format($job->salary, 2) }}</td>
                            <td class="px-6 py-4">{{ $job->company->company_name ?? 'N/A' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-4 py-1.5 text-xs font-semibold rounded-full
                                    {{ $job->status === 'active' ? 'bg-gradient-to-r from-green-500/20 to-green-600/20 text-green-300 border border-green-300/30' :
                                    ($job->status === 'pending' ? 'bg-gradient-to-r from-yellow-500/20 to-yellow-600/20 text-yellow-300 border border-yellow-300/30' :
                                    'bg-gradient-to-r from-red-500/20 to-red-600/20 text-red-300 border border-red-300/30') }}">
                                    {{ ucfirst($job->status ?? 'pending') }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $job->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <!-- ✏️ Edit Button -->
                                    <a href="{{ route('jobs.edit', $job->id) }}"
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-500/20 to-blue-600/20 text-blue-300 border border-blue-300/30 text-xs rounded-lg hover:from-blue-600/20 hover:to-blue-700/20 transition-all duration-300 shadow-md">
                                        <span class="text-sm">✏️</span>
                                        Edit
                                    </a>

                                    <!-- 🗑️ Delete Button -->
                                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-red-500/20 to-red-600/20 text-red-300 border border-red-300/30 text-xs rounded-lg hover:from-red-600/20 hover:to-red-700/20 transition-all duration-300 shadow-md">
                                            <span class="text-sm">🗑️</span>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-white/60">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <span class="text-4xl">📭</span>
                                    <p class="text-lg">No jobs have been posted yet.</p>
                                    <p class="text-sm text-white/40">Click the "Add New Job" button to get started!</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection