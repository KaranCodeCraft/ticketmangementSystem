<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-r from-purple-700 via-purple-500 to-indigo-600 text-white">
        
        <!-- Animated Lock Icon -->
        <div class="text-7xl mb-4 animate-pulse">
            🔒
        </div>

        <!-- Title -->
        <h1 class="text-4xl font-bold mb-2">Access Forbidden</h1>

        <!-- Subtext -->
        <p class="text-lg mb-6">You don't have permission to access this page.</p>

        <!-- Animated Button -->
        <a href="{{ route('dashboard') }}" 
           class="px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
            🔙 Go Back Home
        </a>
    </div>
</x-app-layout>
