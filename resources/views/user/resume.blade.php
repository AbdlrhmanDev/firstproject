@section('dashboard-content')
    <div class="container mx-auto px-6 py-10">

        <!-- ✅ Create Resume Button -->
        <a href="{{ route('resume.create') }}" class="bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600
                   text-white px-5 py-2 rounded-md shadow-md transition-transform transform hover:scale-105">
            ➕ Create
        </a>

        <!-- 📝 Resume List Heading -->
        <h2 class="text-3xl font-bold text-white mb-6 mt-10">All Resumes</h2>

        <!-- 📄 Resume Table -->
        <table class="min-w-full bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-lg shadow-lg">
            <thead>
                <tr class="bg-white/20 text-left">
                    <th class="p-4 border border-white/30">Full Name</th>
                    <th class="p-4 border border-white/30">Phone</th>
                    <th class="p-4 border border-white/30">Email</th>
                    <th class="p-4 border border-white/30">Skills</th>
                    <th class="p-4 border border-white/30">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($resumes as $cv)
                    <tr class="hover:bg-white/20 transition">
                        <td class="p-4 border border-white/30">{{ $cv->full_name }}</td>
                        <td class="p-4 border border-white/30">{{ $cv->phone }}</td>
                        <td class="p-4 border border-white/30">{{ $cv->email }}</td>
                        <td class="p-4 border border-white/30">{{ Str::limit($cv->skills, 30) }}</td>
                        <td class="p-4 border border-white/30 flex flex-wrap gap-2">
                            <!-- 🔍 View -->
                            <a href="{{ route('resume.show', $cv->id) }}"
                                class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                View
                            </a>

                            <!-- ✏️ Edit -->
                            <a href="{{ route('resume.edit', $cv->id) }}"
                                class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                                Edit
                            </a>

                            {{-- 🗑️ Optional Delete Form --}}
                            {{--
                            <form action="{{ route('resume.destroy', $cv->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this resume?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                            --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-6 text-gray-300">
                            No resumes found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection