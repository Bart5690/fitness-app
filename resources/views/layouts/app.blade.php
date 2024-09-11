<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Workout Tracker')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @stack('styles') <!-- For additional styles if needed -->
</head>
<body class="font-sans antialiased bg-gray-100">

<!-- Header Section -->
<header class="bg-blue-600 text-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('workouts.index') }}" class="text-2xl font-bold">
            Workout Tracker
        </a>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="{{ route('workouts.index') }}" class="hover:text-gray-300">Home</a></li>
                <li><a href="{{ route('workouts.create') }}" class="hover:text-gray-300">Add Workout</a></li>
                <!-- Add more links here if needed -->
            </ul>
        </nav>
    </div>
</header>

<!-- Main Content -->
<main class="py-6">
    <div class="container mx-auto px-4">
        @yield('content')
    </div>
</main>

<!-- Footer Section -->
<footer class="bg-gray-800 text-white text-center py-4 mt-6">
    <div class="container mx-auto px-4">
        <p>&copy; {{ date('Y') }} Workout Tracker. All rights reserved.</p>
    </div>
</footer>

<!-- Optional JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts') <!-- For additional scripts if needed -->
</body>
</html>
