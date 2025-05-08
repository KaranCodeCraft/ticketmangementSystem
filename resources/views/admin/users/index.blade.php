<x-app-layout>
    <div class="container mx-auto mt-10 p-8">
        <h1 class="text-2xl font-bold mb-5">Users List</h1>

        @if (session('message'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded-lg">
                {{ session('message') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-3 mb-4 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <table class="min-w-full bg-white shadow-lg rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-700">Name</th>
                    <th class="px-4 py-2 text-left text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left text-gray-700">Role</th>
                    <th class="px-4 py-2 text-left text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->role }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            <a href="{{ route('admin.users.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Create New User</a>
        </div>
    </div>
</x-app-layout>
