<x-app-layout>
    <div class="max-w-2xl mx-auto mt-12 p-8 bg-white shadow-lg rounded-2xl">
        <h3 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-4">📝 Create New Agent</h3>

        <form action="{{ route('agents.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-lg text-gray-600 font-medium mb-2">Agent Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                    placeholder="Enter agent name"
                    required
                >
            </div>

            <div class="mb-8">
                <label for="specialization" class="block text-lg text-gray-600 font-medium mb-2">Specialization</label>
                <input 
                    type="text" 
                    name="specialization" 
                    id="specialization" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter specialization"
                >
            </div>

            <button 
                type="submit" 
                class="w-full py-3 px-6 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
                ➕ Create Agent
            </button>
        </form>
    </div>
</x-app-layout>
