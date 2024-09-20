<!-- resources/views/workouts/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Workout Details</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <span class="font-semibold text-gray-700">Exercise:</span>
                <p class="text-gray-900">{{ $workout->exercise }}</p>
            </div>

            <div class="mb-4">
                <span class="font-semibold text-gray-700">Sets:</span>
                <p class="text-gray-900">{{ $workout->sets }}</p>
            </div>

            <div class="mb-4">
                <span class="font-semibold text-gray-700">Reps:</span>
                <p class="text-gray-900">{{ $workout->reps }}</p>
            </div>

            <div class="mb-4">
                <span class="font-semibold text-gray-700">Weight:</span>
                <p class="text-gray-900">{{ $workout->weight }}</p>
            </div>

            <div class="mb-4">
                <span class="font-semibold text-gray-700">Description:</span>
                <p class="text-gray-900">{!! $workout->description !!}</p>

            <div class="flex justify-end mt-4">
                <a href="{{ route('workouts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-gray-600">
                    Back to List
                </a>
            </div>
        </div>
    </div>
@endsection
