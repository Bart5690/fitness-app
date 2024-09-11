<!-- resources/views/components/header.blade.php -->

<header class="bg-blue-600 text-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('workouts.index') }}" class="text-2xl font-bold">
            Workout Tracker
        </a>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="{{ route('workouts.index') }}" class="hover:text-gray-300">Home</a></li>
                <li><a href="{{ route('workouts.create') }}" class="hover:text-gray-300">Add Workout</a></li>
                <!-- Add more links here as needed -->
            </ul>
        </nav>
    </div>
</header>
