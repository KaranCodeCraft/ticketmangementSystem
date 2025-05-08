<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <!-- Note Header -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">
                Note - <span class="text-gray-500">{{ $note->created_at->format('d M Y, H:i') }}</span>
            </h1>

            <!-- Action Buttons -->
            <div class="flex gap-2">
                <a href="{{ route('note.edit', $note) }}" 
                   class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                    ✏️ Edit
                </a>

                <!-- Delete Form -->
                <form action="{{ route('note.destroy', $note) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                        🗑️ Delete
                    </button>
                </form>
            </div>
        </div>

        <!-- Note Content -->
        <div class="text-gray-700 text-lg leading-relaxed border-t pt-4">
            {{ $note->note }}
        </div>
    </div>
</x-app-layout>
