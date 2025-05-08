<x-app-layout>
    <div class="max-w-lg mx-auto mt-10">
        @if (session('message'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded-lg">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('tickets.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <h2 class="text-2xl font-bold mb-5">Create New Ticket</h2>

            <div class="mb-4">
                <label class="block text-gray-700">Subject</label>
                <input type="text" name="subject" class="w-full border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea name="description" class="w-full border-gray-300 rounded-lg" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Category</label>
                <select name="category" class="w-full border-gray-300 rounded-lg">
                    <option value="Technical">Technical</option>
                    <option value="Billing">Billing</option>
                    <option value="General">General</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Priority</label>
                <select name="priority" class="w-full border-gray-300 rounded-lg">
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                    <option value="Urgent">Urgent</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Create Ticket</button>
            </div>
        </form>
    </div>
</x-app-layout>
