<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-r from-red-600 via-red-500 to-pink-600 text-white">

        <!-- Animated Emoji -->
        <div class="text-8xl mb-4 animate-bounce">
            😕
        </div>

        <!-- Main Title -->
        <h1 class="text-5xl font-bold mb-2">404 - Page Not Found</h1>

        <!-- Subtext -->
        <p class="text-lg mb-6">Sorry, the page you are looking for does not exist or has been moved.</p>

        <!-- Animated Button -->
        <a href="{{ route('dashboard') }}" 
           class="px-6 py-3 bg-white text-red-600 font-semibold rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
            🔙 Go Back Home
        </a>
    </div>
</x-app-layout>
