<x-app-layout>
    <div class="max-w-lg mx-auto mt-10">
        <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <h2 class="text-2xl font-bold mb-5">Edit Ticket</h2>

            <div class="mb-4">
                <label class="block text-gray-700">Subject</label>
                <input type="text" name="subject" class="w-full border-gray-300 rounded-lg" value="{{ $ticket->subject }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea name="description" class="w-full border-gray-300 rounded-lg" required>{{ $ticket->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Category</label>
                <select name="category" class="w-full border-gray-300 rounded-lg">
                    <option value="Technical" {{ $ticket->category == 'Technical' ? 'selected' : '' }}>Technical</option>
                    <option value="Billing" {{ $ticket->category == 'Billing' ? 'selected' : '' }}>Billing</option>
                    <option value="General" {{ $ticket->category == 'General' ? 'selected' : '' }}>General</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Priority</label>
                <select name="priority" class="w-full border-gray-300 rounded-lg">
                    <option value="Low" {{ $ticket->priority == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ $ticket->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ $ticket->priority == 'High' ? 'selected' : '' }}>High</option>
                    <option value="Urgent" {{ $ticket->priority == 'Urgent' ? 'selected' : '' }}>Urgent</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Status</label>
                <select name="status" class="w-full border-gray-300 rounded-lg">
                    <option value="Open" {{ $ticket->status == 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="In Progress" {{ $ticket->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Closed" {{ $ticket->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
            

            <div class="flex justify-between">
                <a href="{{ route('tickets.index') }}" 
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update Ticket</button>
            </div>
        </form>
    </div>
</x-app-layout>
