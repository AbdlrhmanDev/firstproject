@extends('employer.dashboard')

@section('dashboard-content')
<div class="container mx-auto px-6 py-10">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-4xl font-bold text-white mb-6 mt-10 relative">
                📥 Job Applications
                <span class="absolute -bottom-1 left-0 w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></span>
            </h2>
            <div class="text-sm text-gray-400">
                Total Applications: <span class="text-white font-semibold">{{ count($orders) }}</span>
            </div>
        </div>

        <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl shadow-2xl overflow-hidden">
            <table class="min-w-full divide-y divide-white/10">
                <thead>
                    <tr class="bg-white/10">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white/80 tracking-wider">👤 Candidate</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white/80 tracking-wider">💼 Job Title</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white/80 tracking-wider">📝 Message</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white/80 tracking-wider">📊 Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white/80 tracking-wider">⚙️ Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/10">
                    @forelse ($orders as $order)
                        <tr class="hover:bg-white/10 transition-all duration-300 transform hover:scale-[1.01]">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center text-white font-bold">
                                        {{ substr($order->user->name ?? 'N/A', 0, 1) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-white">{{ $order->user->name ?? 'N/A' }}</div>
                                        <div class="text-sm text-gray-400">{{ $order->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white font-medium">{{ $order->job->title ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-300" title="{{ $order->message }}">
                                    {{ Str::limit($order->message, 50) }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusColors = [
                                        'Pending' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30',
                                        'Accepted' => 'bg-green-500/20 text-green-400 border-green-500/30',
                                        'Rejected' => 'bg-red-500/20 text-red-400 border-red-500/30'
                                    ];
                                @endphp
                                <span class="px-3 py-1 text-xs font-semibold rounded-full border {{ $statusColors[$order->status] ?? 'bg-gray-500/20 text-gray-400 border-gray-500/30' }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('employer.applications.updateStatus', $order->id) }}" method="POST" class="flex space-x-2 items-center">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status"
                                        class="bg-white/5 text-white px-3 py-2 rounded-lg border border-white/10 shadow-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Accepted" {{ $order->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                        <option value="Rejected" {{ $order->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                    <button type="submit"
                                        class="bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white px-4 py-2 rounded-lg transition duration-200 transform hover:scale-105 shadow-lg">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="text-6xl mb-4">📭</div>
                                    <h3 class="text-xl font-semibold text-white mb-2">No Applications Found</h3>
                                    <p class="text-gray-400">There are no job applications to display at the moment.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
    