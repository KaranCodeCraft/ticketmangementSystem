<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create Note</h1>

        <form action="{{ route('note.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Textarea for Note Content -->
            <textarea 
                name="note" 
                class="w-full h-40 p-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 resize-none"
                placeholder="Enter your note here"></textarea>

            <!-- Action Buttons -->
            <div class="flex justify-between">
                <a href="{{ route('note.index') }}" 
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    Cancel
                </a>

                <button type="submit" 
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    Create Note
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
