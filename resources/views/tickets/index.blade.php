<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-5">All Tickets</h2>

        @if (session('message'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded-lg">
                {{ session('message') }}
            </div>
        @endif

        <a href="{{ route('tickets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 mb-5 inline-block">Create Ticket</a>

        @foreach ($tickets as $ticket)
            <div class="bg-white p-4 mb-4 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold">{{ $ticket->subject }}</h3>
                <p class="text-gray-600">{{ $ticket->category }} | {{ $ticket->priority }}</p>
                <p class="text-sm text-gray-500">Status: {{ $ticket->status }}</p>

                <div class="flex space-x-2 mt-2">
                    <a href="{{ route('tickets.show', $ticket->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">View</a>
                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Edit</a>
                    @if(auth()->user()->role ==='admin')
                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
