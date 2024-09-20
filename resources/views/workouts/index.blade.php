<!-- resources/views/workouts/index.blade.php -->

@extends('layouts.app')

@section('content')
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
                            <a href="{{ route('workouts.show', $workout->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600">
                                Info
                            </a>
                            <!-- Edit Button (alleen tonen als ingelogde gebruiker de eigenaar is) -->
                            @if (auth()->check() && auth()->user()->id == $workout->user_id)
                                <a href="{{ route('workouts.edit', $workout->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded-md hover:bg-yellow-500">
                                    Edit
                                </a>
                                <!-- Delete Form -->
                                <form action="{{ route('workouts.destroy', $workout->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">
                                        Verwijder
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
