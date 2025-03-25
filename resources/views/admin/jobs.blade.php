@extends('admin')

@section('dashboard-content')
    <h2 class="text-2xl font-bold text-white mb-6">📋 All Jobs Table</h2>

    <div class="overflow-x-auto rounded-2xl shadow-lg border border-white/10 backdrop-blur-md bg-white/5">
        <table class="min-w-full text-sm text-white">
            <thead class="bg-white/10 text-white/70 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">Title</th>
                    {{-- <th class="px-4 py-3 text-left">Type</th> --}}
                    <th class="px-4 py-3 text-left">Salary</th>
                    <th class="px-4 py-3 text-left">Company</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Posted</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @forelse($jobs as $job)
                        <tr class="hover:bg-white/10 transition">
                            <td class="px-4 py-3 font-medium">
                                <a href="{{ route('jobs.show', $job->id) }}" class="hover:underline">
                                    {{ $job->title }}
                                </a>
                            </td>
                            {{-- <td class="px-4 py-3">{{ ucfirst($job->type) }}</td> --}}
                            <td class="px-4 py-3">${{ number_format($job->salary, 2) }}</td>
                            <td class="px-4 py-3">{{ $job->company->company_name ?? 'N/A' }}</td>
                            <td class="px-4 py-3">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                            {{ $job->status === 'active' ? 'bg-green-500/20 text-green-300 border border-green-300/30' :
                    ($job->status === 'pending' ? 'bg-yellow-500/20 text-yellow-300 border border-yellow-300/30' :
                        'bg-red-500/20 text-red-300 border border-red-300/30') }}">
                                    {{ ucfirst($job->status ?? 'pending') }}
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ $job->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('jobs.edit', $job->id) }}"
                                        class="text-blue-400 hover:text-blue-600 text-xs">Edit</a>
                                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-600 text-xs">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-white/60">
                            No jobs have been posted yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection