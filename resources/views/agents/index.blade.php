<x-app-layout>
    <div class="max-w-7xl mx-auto mt-8 p-6 bg-white shadow-md rounded-lg">
        <h3 class="text-2xl font-semibold mb-6 text-gray-700">Agents List</h3>

        @if (session('success'))
            <div class="alert alert-success bg-green-100 text-green-800 p-4 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('agents.create') }}" class="inline-block px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 mb-4">
            Create New Agent
        </a>

        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Name</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Specialization</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agents as $agent)
                <tr class="border-t border-gray-200 hover:bg-gray-50">
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $agent->id }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $agent->name }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $agent->specialization }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 space-x-2">
                        <a href="{{ route('agents.edit', $agent->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                            Edit
                        </a>
                        <form action="{{ route('agents.destroy', $agent->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this note?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 mt-2">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
