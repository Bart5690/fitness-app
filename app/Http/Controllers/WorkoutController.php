<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{

    public function index()
    {
        $workouts = Workout::all();
        return view('workouts.index', compact('workouts'));
    }

    public function create()
    {
        return view('workouts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'exercise' => 'required|string',
            'sets' => 'required|integer',
            'reps' => 'required|integer',
            'weight' => 'required|numeric',
        ]);

        Workout::create($request->all());

        return redirect()->route('workouts.index')
            ->with('success', 'Workout created successfully.');
    }


    public function show(Workout $workout)
    {
        return view('workouts.show', compact('workout'));
    }


    public function edit(Workout $workout)
    {
        return view('workouts.edit', compact('workout'));
    }


    public function update(Request $request, Workout $workout)
    {
        $request->validate([
            'exercise' => 'required|string',
            'sets' => 'required|integer',
            'reps' => 'required|integer',
            'weight' => 'required|numeric',
        ]);

        $workout->update($request->all());

        return redirect()->route('workouts.index')
            ->with('success', 'Workout updated successfully.');
    }


    public function destroy(Workout $workout)
    {
        $workout->delete();

        return redirect()->route('workouts.index')
            ->with('success', 'Workout deleted successfully.');
    }
}
