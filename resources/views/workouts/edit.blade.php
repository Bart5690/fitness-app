<!-- resources/views/workouts/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Edit Workout</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('workouts.update', $workout->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            @include('workouts.form')

            <!-- Add TinyMCE editor for description -->
            <x-forms.tinymce-editor :value="$workout->description" />

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
