@extends('layouts.app')

@section('title', 'Edit Muscle Group')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Edit Muscle Group</h1>

        <form action="{{ route('musclegroups.update', $musclegroup->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('musclegroups.form')

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
