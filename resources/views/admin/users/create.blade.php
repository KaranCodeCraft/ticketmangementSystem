<x-app-layout>
    <div class="max-w-lg mx-auto mt-10">
        @if (session('message'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded-lg">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <h2 class="text-2xl font-bold mb-5">Create New User</h2>

            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full border-gray-300 rounded-lg" minlength="8" required>
            </div>

            {{-- <div class="mb-4">
                <label class="block text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full border-gray-300 rounded-lg" minlength="8" required>
            </div> --}}

            <div class="mb-4">
                <label class="block text-gray-700">Role</label>
                <select name="role" class="w-full border-gray-300 rounded-lg">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                    Back
                </a>
            
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Create User
                </button>
            </div>
            
        </form>
    </div>
</x-app-layout>
