@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Workouts van {{ $user->name }}</h1>

        @if ($workouts->count() > 0)
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-6 text-left">Oefening</th>
                    <th class="py-3 px-6 text-left">Sets</th>
                    <th class="py-3 px-6 text-left">Reps</th>
                    <th class="py-3 px-6 text-left">Gewicht</th>
                    <th class="py-3 px-6 text-left">Beschrijving</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @foreach ($workouts as $workout)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $workout->exercise }}</td>
                        <td class="py-3 px-6">{{ $workout->sets }}</td>
                        <td class="py-3 px-6">{{ $workout->reps }}</td>
                        <td class="py-3 px-6">{{ $workout->weight }} kg</td>
                        <td class="py-3 px-6">{!! $workout->description !!}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No workouts available for {{ $user->name }}.</p>
        @endif
    </div>
@endsection
