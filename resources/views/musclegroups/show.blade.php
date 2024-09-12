@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Muscle Group Details</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <p><strong>Name:</strong> {{ $musclegroup->name }}</p>
            <p><strong>Image:</strong></p>
            @if ($musclegroup->image)
                <img src="{{ asset('storage/' . $musclegroup->image) }}" alt="{{ $musclegroup->name }}" class="w-full max-w-lg h-auto object-cover mt-2">
            @else
                No Image
            @endif

            <div class="mt-6">
                <a href="{{ route('musclegroups.edit', $musclegroup->id) }}" class="bg-yellow-400 text-white px-4 py-2 rounded-md hover:bg-yellow-500">
                    Edit
                </a>
                <form action="{{ route('musclegroups.destroy', $musclegroup->id) }}" method="POST" class="inline-block ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
