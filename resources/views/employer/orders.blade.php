@extends('employer.dashboard')
@section('dashboard-content')
    <div class="container mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold text-white mb-6 mt-10">Job Applications</h2>

        <table class="min-w-full bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-lg shadow-lg">
            <thead>
                <tr class="bg-white/20">
                    <th class="p-4 border border-white/30">Candidate</th>
                    <th class="p-4 border border-white/30">Job Title</th>
                    <th class="p-4 border border-white/30">Message</th>
                    <th class="p-4 border border-white/30">Status</th>
                    <th class="p-4 border border-white/30">Actions</th>
                </tr>
            </thead>
        <tbody>
            @if($orders->isEmpty())
                <tr>
                    <td colspan="5" class="text-center text-white py-4">No applications found.</td>
                </tr>
            @else
                @foreach ($orders as $order)
                    <tr class="hover:bg-white/20 transition">
                        <td class="p-4 border border-white/30">{{ $order->user->name ?? 'N/A' }}</td>
                        <td class="p-4 border border-white/30">{{ $order->job->title ?? 'N/A' }}</td>
                        <td class="p-4 border border-white/30">{{ Str::limit($order->message, 50) }}</td>
                        <td class="p-4 border border-white/30">
                            @if ($order->status === 'Pending')
                                <span class="px-3 py-1 text-sm rounded-md bg-yellow-500 text-white">Pending</span>
                            @elseif ($order->status === 'Accepted')
                                <span class="px-3 py-1 text-sm rounded-md bg-green-500 text-white">Accepted</span>
                            @elseif ($order->status === 'Rejected')
                                <span class="px-3 py-1 text-sm rounded-md bg-red-500 text-white">Rejected</span>
                            @endif
                        </td>
                        <td class="p-4 border border-white/30">
                            <form action="{{ route('employer.applications.updateStatus', $order->id) }}" method="POST">

                                @csrf
                                @method('PATCH')
                        <select name="status"
                            class="bg-gray-800/80 text-white px-4 py-2 rounded-lg border border-white/30 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option class="bg-gray-800 text-white" value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option class="bg-gray-800 text-white" value="Accepted" {{ $order->status == 'Accepted' ? 'selected' : '' }}>Accepted
                            </option>
                            <option class="bg-gray-800 text-white" value="Rejected" {{ $order->status == 'Rejected' ? 'selected' : '' }}>Rejected
                            </option>
                        </select>



                                <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                    Update
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>

        </table>
    </div>
@endsection