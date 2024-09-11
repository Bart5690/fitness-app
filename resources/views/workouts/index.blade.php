<!-- resources/views/workouts/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Workouts</h1>
        <a href="{{ route('workouts.create') }}" class="btn btn-primary">Add Workout</a>
        <table class="table">
            <thead>
            <tr>
                <th>Exercise</th>
                <th>Sets</th>
                <th>Reps</th>
                <th>Weight</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($workouts as $workout)
                <tr>
                    <td>{{ $workout->exercise }}</td>
                    <td>{{ $workout->sets }}</td>
                    <td>{{ $workout->reps }}</td>
                    <td>{{ $workout->weight }}</td>
                    <td>
                        <a href="{{ route('workouts.show', $workout->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('workouts.edit', $workout->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('workouts.destroy', $workout->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
