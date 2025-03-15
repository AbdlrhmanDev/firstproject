@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-white leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-lg text-gray-300 mb-4">Manage Job Listings</h1>

                <!-- Create Job Button -->
                <div class="flex justify-end mb-4">
                    <a href="{{ route('jobs.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                        + Create New Job
                    </a>
                </div>

                <!-- Jobs Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-gray-900 text-white border border-gray-700">
                        <thead>
                            <tr class="bg-gray-700 text-gray-300">
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Type</th>
                                <th class="px-4 py-2">Salary</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                                <tr class="border-t border-gray-600">
                                    <td class="px-4 py-2">{{ $job->id }}</td>
                                    <td class="px-4 py-2">{{ $job->title }}</td>
                                    <td class="px-4 py-2">{{ $job->type }}</td>
                                    <td class="px-4 py-2">${{ number_format($job->salary, 2) }}</td>
                                    <td class="px-4 py-2 flex space-x-2">
                                        <a href="{{ route('jobs.show', $job->id) }}"
                                            class="text-blue-400 hover:underline">View</a>
                                        <a href="{{ route('jobs.edit', $job->id) }}"
                                            class="text-yellow-400 hover:underline">Edit</a>
                                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex justify-center">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection