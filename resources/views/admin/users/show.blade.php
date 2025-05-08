<x-app-layout>
    <div class="max-w-lg mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">User Details</h1>

        <div class="mb-4">
            <label class="block text-gray-700">Name:</label>
            <p class="text-gray-800">{{ $user->name }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email:</label>
            <p class="text-gray-800">{{ $user->email }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Role:</label>
            <p class="text-gray-800">{{ $user->role }}</p>
        </div>

        <div class="mt-5">
            <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Back to Users List</a>
        </div>
    </div>
</x-app-layout>
