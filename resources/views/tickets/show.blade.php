<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <!-- Ticket Title and Description -->
        <h2 class="text-3xl font-bold mb-6 text-gray-800">{{ $ticket->subject }}</h2>

        <div class="bg-gray-50 p-6 rounded-lg shadow-sm mb-6">
            <p class="text-lg font-semibold text-gray-700"><strong>Description:</strong> {{ $ticket->description }}</p>
            <p class="text-lg font-semibold text-gray-700"><strong>Category:</strong> {{ $ticket->category }}</p>
            <p class="text-lg font-semibold text-gray-700"><strong>Priority:</strong> {{ $ticket->priority }}</p>
            <p class="text-lg font-semibold text-gray-700"><strong>Status:</strong> {{ $ticket->status }}</p>
        </div>

        <!-- Agent Assignment -->
        <div class="mb-6">
            <h3 class="text-2xl font-semibold mb-4 text-gray-800">Assigned Agent</h3>
            @if ($ticket->agent)
                <p class="text-lg text-gray-600">Assigned Agent: <strong>{{ $ticket->agent->name }}</strong></p>
            @else
                <p class="text-lg text-gray-600">Assigned Agent: <strong>Not Assigned</strong></p>
            @endif
        </div>
        @if (auth()->user()->role === 'admin')


            <div class="mb-6">
                <h3 class="text-2xl font-semibold mb-4 text-gray-800">Assign Agent</h3>
                <form action="{{ route('tickets.assignAgent', $ticket->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="form-group">
                        <label for="agent_id" class="block text-lg font-medium text-gray-700">Select Agent</label>
                        <select name="agent_id" id="agent_id"
                            class="w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required>
                            <option value="">-- Select Agent --</option>
                            @foreach ($agents as $agent)
                                <option value="{{ $agent->id }}"
                                    {{ $ticket->agent_id == $agent->id ? 'selected' : '' }}>
                                    {{ $agent->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Assign Agent
                    </button>
                </form>

                @if (session('success'))
                    <div class="mt-4 p-4 bg-green-100 text-green-800 border border-green-200 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        @endif
        <!-- Ticket Replies Section -->
        <div class="mt-8">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Replies</h3>

            <!-- Display all replies -->
            @foreach ($ticket->replies ?? [] as $reply)
                <div class="bg-gray-100 p-4 mb-3 rounded-lg shadow-sm">
                    <p class="text-gray-800 font-semibold">{{ $reply->user->name }}:</p>
                    <p class="text-gray-700">{{ $reply->message }}</p>
                    <p class="text-sm text-gray-500">{{ $reply->created_at->diffForHumans() }}</p>
                </div>
            @endforeach

            <!-- Reply Form -->
            <form action="{{ route('tickets.reply', $ticket->id) }}" method="POST" class="mt-6">
                @csrf
                <textarea name="message"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Write your reply..." rows="4"></textarea>
                <button type="submit"
                    class="mt-4 w-full py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Reply
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
