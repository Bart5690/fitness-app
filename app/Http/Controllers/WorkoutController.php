<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateWorkoutRequest;
use App\Models\Musclegroup;
use App\Models\Workout;
use Illuminate\Http\Request;


class WorkoutController extends Controller
{

    public function index()
    {
        $musclegroups = Musclegroup::all(); // Fetch all muscle groups
        $workouts = Workout::all(); // Fetch all workouts

        return view('workouts.index', compact('workouts', 'musclegroups'));
    }


    // In WorkoutController

    public function create()
    {
        $musclegroups = Musclegroup::all(); // Fetch all muscle groups

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
        $workout = new Workout();
        $workout->exercise = $request->input('exercise');
        $workout->sets = $request->input('sets');
        $workout->reps = $request->input('reps');
        $workout->weight = $request->input('weight');
        $workout->description = $request->input('description');

        // Save workout
        $workout->save();

        // Koppel de geselecteerde spiergroepen via de pivot table
        if ($request->has('musclegroups')) {
            $workout->musclegroups()->sync($request->input('musclegroups'));
        }

        return redirect()->route('workouts.index')->with('success', 'Workout succesvol opgeslagen!');
    }


    public function update(Request $request, Workout $workout)
    {
        $validatedData = $request->validate([
            'exercise' => 'required|string',
            'sets' => 'required|integer',
            'reps' => 'required|integer',
            'weight' => 'nullable|numeric',
            'musclegroups' => 'required|array',
            'musclegroups.*' => 'exists:musclegroups,id',
            'description' => 'nullable|string',
        ]);

        $workout->update($validatedData);

        // Update de gekoppelde spiergroepen
        $workout->musclegroups()->sync($request->musclegroups);

        return redirect()->route('workouts.index');
    }
}
