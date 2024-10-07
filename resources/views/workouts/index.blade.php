<!-- resources/views/workouts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <!-- Success message popup -->
        @if (session('success'))
            <div id="success-popup" class="fixed inset-0 flex items-center justify-center bg-green-100 bg-opacity-75 z-50">
                <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
                    <svg class="h-12 w-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-green-600 text-xl font-semibold">{{ session('success') }}</span>
                </div>
            </div>

            <script>
                // Script om de popup na 3 seconden te verbergen
                setTimeout(function() {
                    document.getElementById('success-popup').style.display = 'none';
                }, 3000); // Popup verdwijnt na 3 seconden
            </script>
        @endif
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-center my-8">Workouts</h1>

        <!-- Add Workout Button (alleen tonen als gebruiker is ingelogd) -->
        <div class="text-right mb-6">
            @if (auth()->check())
                <a href="{{ route('workouts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">
                    Add Workout
                </a>
            @endif
        </div>

        <!-- Workouts Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-6 text-left">Oefening</th>
                    <th class="py-3 px-6 text-left">Sets</th>
                    <th class="py-3 px-6 text-left">Reps</th>
                    <th class="py-3 px-6 text-left">Gewicht</th>
                    <th class="py-3 px-6 text-left">Toegevoegd door</th> <!-- Toegevoegd door kolom -->
                    <th class="py-3 px-6 text-left">Acties</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">

                @foreach ($workouts as $workout)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $workout->exercise }}</td>
                        <td class="py-3 px-6">{{ $workout->sets }}</td>
                        <td class="py-3 px-6">{{ $workout->reps }}</td>
                        <td class="py-3 px-6">{{ $workout->weight }} kg</td>
                        <td class="py-3 px-6">
                            <a href="{{ route('user.workouts', ['user' => $workout->user_id]) }}">
                                Workouts van {{ $workout->user->name }}
                            </a>

                        </td> <!-- Weergeef de naam van de gebruiker die de workout heeft toegevoegd -->
                        <td class="py-3 px-6 flex space-x-2">
                            <!-- Show Button -->
                            <a href="{{ route('workouts.show', $workout->slug) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600">
                                Info
                            </a>
                            <!-- Edit Button (alleen tonen als ingelogde gebruiker de eigenaar is) -->
                            @if (auth()->check() && auth()->user()->id == $workout->user_id)
                                <a href="{{ route('workouts.edit', $workout->slug) }}" class="bg-yellow-400 text-white px-3 py-1 rounded-md hover:bg-yellow-500">
                                    Edit
                                </a>
                                <!-- Delete Form -->
                                <form action="{{ route('workouts.destroy', $workout->slug) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">
                                        Verwijder
                                    </button>
                                </form>
                                <!-- Mail Button -->
                                <form action="{{ route('workouts.email', $workout->slug) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600">
                                        Mailen
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
