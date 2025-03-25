@extends('dashboard')

@section('dashboard-content')
    <div class="container mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold text-white mb-6 mt-10">My Applications</h2>

        <table class="min-w-full bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-lg shadow-lg">
            <thead>
                <tr class="bg-white/20">
                    <th class="p-4 border border-white/30">Job Title</th>
                    <th class="p-4 border border-white/30">Company</th>
                    <th class="p-4 border border-white/30">Status</th>
                    <th class="p-4 border border-white/30">Message</th>
                    <th class="p-4 border border-white/30">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="hover:bg-white/20 transition">
                        <td class="p-4 border border-white/30">{{ $order->job->title }}</td>
                        <td class="p-4 border border-white/30">{{ $order->job->employer->name ?? 'N/A' }}</td>
                        <td class="p-4 border border-white/30">
                            <span class="px-3 py-1 text-sm rounded-md bg-blue-500 text-white">
                                Pending
                            </span>
                        </td>
                        <td class="p-4 border border-white/30">{{ Str::limit($order->message, 50) }}</td>
                        <td class="p-4 border border-white/30 flex space-x-2">
                            <a href="{{ route('user.orders') }}"
                                class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection