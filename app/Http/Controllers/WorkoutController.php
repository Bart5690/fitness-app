<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateWorkoutRequest;
use App\Models\Musclegroup;
use App\Models\Workout;

class WorkoutController extends Controller
{

    public function index()
    {
        $musclegroups = Musclegroup::all(); // Verkrijg alle spiergroepen
        $workouts = Workout::all(); // Verkrijg alle workouts

        return view('workouts.index', compact('workouts', 'musclegroups'));
    }


    // In WorkoutController

    public function create()
    {
        $musclegroups = Musclegroup::all(); // Haal alle spiergroepen op
        return view('workouts.create', compact('musclegroups'));
    }

    public function edit($id)
    {
        $workout = Workout::findOrFail($id);
        $musclegroups = Musclegroup::all(); // Haal alle spiergroepen op
        return view('workouts.edit', compact('workout', 'musclegroups'));
    }


    public function show(Workout $workout)
    {
        return view('workouts.show', compact('workout'));
    }



    public function destroy(Workout $workout)
    {
        $workout->delete();

        return redirect()->route('workouts.index')
            ->with('success', 'Workout deleted successfully.');
    }

    public function store(CreateOrUpdateWorkoutRequest $request)
    {
        $workout = Workout::create($request->validated());
        $workout->musclegroup()->associate($request->musclegroup_id);
        $workout->save();

        return redirect()->route('workouts.index');
    }

    public function update(CreateOrUpdateWorkoutRequest $request, Workout $workout)
    {
        $workout->update($request->validated());
        $workout->musclegroup()->associate($request->musclegroup_id);
        $workout->save();

        return redirect()->route('workouts.index');
    }
}
