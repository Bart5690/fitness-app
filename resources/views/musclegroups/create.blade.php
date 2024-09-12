@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Add New Muscle Group</h1>

        <form action="{{ route('musclegroups.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Muscle Group</label>
                <select id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('name') border-red-500 @enderror">
                    <option value="">Select Muscle Group</option>
                    <option value="Borst" {{ old('name') == 'Borst' ? 'selected' : '' }}>Borst</option>
                    <option value="Rug" {{ old('name') == 'Rug' ? 'selected' : '' }}>Rug</option>
                    <option value="Schouders" {{ old('name') == 'Schouders' ? 'selected' : '' }}>Schouders</option>
                    <option value="Biceps" {{ old('name') == 'Biceps' ? 'selected' : '' }}>Biceps</option>
                    <option value="Triceps" {{ old('name') == 'Triceps' ? 'selected' : '' }}>Triceps</option>
                    <option value="Abs" {{ old('name') == 'Abs' ? 'selected' : '' }}>Abs</option>
                    <option value="Benen" {{ old('name') == 'Benen' ? 'selected' : '' }}>Benen</option>
                </select>
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image upload -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
