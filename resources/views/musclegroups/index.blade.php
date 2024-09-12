@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-center my-8">Muscle Groups</h1>

        <div class="text-right mb-6">
            <a href="{{ route('musclegroups.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">
                Add Muscle Group
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Image</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @foreach ($musclegroups as $musclegroup)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $musclegroup->name }}</td>
                        <td class="py-3 px-6">
                            @if($musclegroup->image)
                                <img src="{{ asset('storage/' . $musclegroup->image) }}" alt="{{ $musclegroup->name }}" class="w-16 h-16 object-cover">
                            @endif
                        </td>
                        <td class="py-3 px-6 flex space-x-2">
                            <a href="{{ route('musclegroups.show', $musclegroup->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600">
                                Info
                            </a>
                            <a href="{{ route('musclegroups.edit', $musclegroup->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded-md hover:bg-yellow-500">
                                Edit
                            </a>
                            <form action="{{ route('musclegroups.destroy', $musclegroup->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
