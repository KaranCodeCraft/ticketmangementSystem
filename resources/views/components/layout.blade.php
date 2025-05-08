<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Notes Application</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Header Navigation Bar -->
    <header class="bg-blue-600 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('note.index') }}" class="text-2xl font-bold hover:text-gray-200">
                📒 My Notes
            </a>
            <nav class="space-x-4">
                <a href="{{ route('note.index') }}" class="hover:text-gray-200">All Notes</a>
                <a href="{{ route('note.create') }}" class="hover:text-gray-200">New Note</a>
            </nav>
        </div>
    </header>

    <!-- Flash Message -->
    @if (session('message'))
        <div class="max-w-4xl mx-auto mt-4 p-4 bg-green-500 text-white text-center rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto p-6">
        {{ $slot }}
    </main>
</body>
</html>
