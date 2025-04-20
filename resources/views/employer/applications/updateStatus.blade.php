<td class="p-4 border border-white/30">
    <form action="{{ route('employer.applications.updateStatus', $order->id) }}" method="POST"
        class="flex flex-wrap items-center gap-2">
        @csrf
        @method('PATCH')

        <!-- Select Status -->
        <select name="status"
            class="bg-white/20 backdrop-blur-md text-white px-3 py-2 rounded-md border border-white/30 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Accepted" {{ $order->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
            <option value="Rejected" {{ $order->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
        </select>

        <!-- Update Button -->
        <button type="submit"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md shadow transition-all duration-200">
            Update
        </button>
    </form>
</td>