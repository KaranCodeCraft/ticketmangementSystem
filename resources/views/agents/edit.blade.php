<x-app-layout>
    <div class="max-w-2xl mx-auto mt-8 p-6 bg-white shadow-md rounded-lg">
        <h3 class="text-2xl font-semibold mb-6 text-gray-700">Edit Agent</h3>

        <form action="{{ route('agents.update', $agent->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-medium">Agent Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="{{ $agent->name }}" required>
            </div>

            <div class="mb-6">
                <label for="specialization" class="block text-gray-600 font-medium">Specialization</label>
                <input type="text" name="specialization" id="specialization" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="{{ $agent->specialization }}">
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Update Agent
            </button>
        </form>
    </div>
</x-app-layout>
