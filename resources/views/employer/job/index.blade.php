@extends('employer.dashboard')

@section('dashboard-content')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-white">Manage Jobs</h2>
        <a href=""
            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">➕ Add Job</a>
    </div>

    <table class="w-full bg-white/10 text-white rounded-lg overflow-hidden">
        <thead class="bg-white/20">
            <tr>
                <th class="p-4 border border-white/20">Title</th>
                <th class="p-4 border border-white/20">Salary</th>
                <th class="p-4 border border-white/20">Featured</th>
                <th class="p-4 border border-white/20">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr class="hover:bg-white/10 transition">
                    <td class="p-4 border border-white/20">{{ $job->title }}</td>
                    <td class="p-4 border border-white/20">${{ number_format($job->salary, 2) }}</td>
                    <td class="p-4 border border-white/20">
                        @if ($job->featured)
                            <span class="px-3 py-1 bg-green-500 text-white rounded-md text-sm">Yes</span>
                        @else
                            <span class="px-3 py-1 bg-red-500 text-white rounded-md text-sm">No</span>
                        @endif
                    </td>
                    <td class="p-4 border border-white/20 space-x-2">
                        <a href="{{ route('employer.job.edit', $job) }}"
                            class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">✏️ Edit</a>

                        <form action="{{ route('employer.job.destroy', $job) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Are you sure you want to delete this job?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">🗑️
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection