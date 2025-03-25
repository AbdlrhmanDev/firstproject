<td class="p-4 border border-white/30">
    <form action="{{ route('employer.applications.updateStatus', $order->id) }}" method="POST">

        @csrf
        @method('PATCH')
        <select name="status" class="text-black p-2 rounded-md">
            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Accepted" {{ $order->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
            <option value="Rejected" {{ $order->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
        <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
            Update
        </button>
    </form>
</td>