<x-app-layout>
    <div class="max-w-6xl mx-auto mt-10">

        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">All Notes</h1>
            <a href="{{ route('note.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + New Note
            </a>
        </div>

        <!-- Notes Grid -->
        @if ($notes->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($notes as $note)
                    <div class="p-5 border border-gray-200 rounded-lg shadow-sm bg-white">
                        <p class="text-gray-800 font-semibold text-lg mb-2">Note #{{ $note->id }}</p>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $note->note }}</p> <!-- line-clamp for truncation -->

                        <div class="flex justify-between items-center text-sm text-gray-500">
                            <div>Created At: {{ $note->created_at->format('d M Y, H:i') }}</div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 mt-3">
                            <a href="{{ route('note.show', $note) }}" 
                               class="bg-gray-200 text-gray-800 px-3 py-1 rounded-lg hover:bg-gray-300 transition">
                                View
                            </a>

                            <a href="{{ route('note.edit', $note) }}" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 transition">
                                Edit
                            </a>

                            <form action="{{ route('note.destroy', $note) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this note?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-8">
                {{ $notes->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-center text-gray-500">No notes available. Click "New Note" to add one!</p>
        @endif
    </div>
</x-app-layout>
