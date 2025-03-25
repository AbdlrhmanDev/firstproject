@extends('employer.dashboard')


@section('dashboard-content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-extrabold text-white text-center mb-8">Edit Job</h1>

        <div>
            <form action="{{ route('employer.jobs.update', $job->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block text-white text-lg font-semibold mb-2">Job Title</label>
                    <input type="text" name="title" value="{{ $job->title }}"
                        class="w-full p-3 rounded-md bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div class="mb-6">
                    <label class="block text-white text-lg font-semibold mb-2">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full p-3 rounded-md bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500 outline-none">{{ $job->description }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-white text-lg font-semibold mb-2">Salary</label>
                    <input type="number" name="salary" value="{{ $job->salary }}"
                        class="w-full p-3 rounded-md bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div class="flex justify-between mt-6">
                    <a href="{{ route('employer.jobs.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-3 rounded-md">
                        ⬅ Cancel
                    </a>
                    <button type="submit" class="bg-gray-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-md">
                        ✅ Update Job
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection