<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateWorkoutRequest;
use App\Models\Musclegroup;
use App\Models\Workout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    // Alleen ingelogde gebruikers kunnen toegang krijgen tot deze controller-acties
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Laat alle workouts zien, inclusief de naam van de gebruiker.
     */
    public function index()
    {
        $musclegroups = Musclegroup::all(); // Haal alle spiergroepen op
        $workouts = Workout::with('user')->get(); // Haal alle workouts op, inclusief gebruikersinfo

        return view('workouts.index', compact('workouts', 'musclegroups'));
    }

    /**
     * Laat workouts van een specifieke gebruiker zien.
     */
    public function userWorkouts($userId)
    {
        $user = User::findOrFail($userId);
        $workouts = Workout::where('user_id', $userId)->get(); // Workouts van de specifieke gebruiker

        return view('workouts.user-workouts', compact('workouts', 'user'));
    }

    /**
     * Toon de form voor het aanmaken van een nieuwe workout.
     */
    public function create()
    {
        $musclegroups = Musclegroup::all(); // Haal alle spiergroepen op
        return view('workouts.create', compact('musclegroups'));
    }

    /**
     * Sla een nieuwe workout op.
     */
    public function store(CreateOrUpdateWorkoutRequest $request)
    {
        $workout = new Workout();
        $workout->exercise = $request->input('exercise');
        $workout->sets = $request->input('sets');
        $workout->reps = $request->input('reps');
        $workout->weight = $request->input('weight');
        $workout->description = $request->input('description');
        $workout->user_id = Auth::id(); // Koppel de workout aan de ingelogde gebruiker

        // Sla de workout op
        $workout->save();

        // Koppel de geselecteerde spiergroepen via de pivot table
        if ($request->has('musclegroups')) {
            $workout->musclegroups()->sync($request->input('musclegroups'));
        }

        return redirect()->route('workouts.index')->with('success', 'Workout succesvol opgeslagen!');
    }

    /**
     * Toon de form voor het bewerken van een workout.
     */
    public function edit($id)
    {
        $workout = Workout::findOrFail($id);
        $musclegroups = Musclegroup::all(); // Haal alle spiergroepen op

        // Controleer of de ingelogde gebruiker de eigenaar van de workout is
        if ($workout->user_id !== Auth::id()) {
            return redirect()->route('workouts.index')->with('error', 'Je mag deze workout niet bewerken.');
        }

        return view('workouts.edit', compact('workout', 'musclegroups'));
    }

    /**
     * Update een bestaande workout.
     */
    public function update(Request $request, Workout $workout)
    {
        // Zorg ervoor dat alleen de eigenaar de workout kan updaten
        if ($workout->user_id !== Auth::id()) {
            return redirect()->route('workouts.index')->with('error', 'Je mag deze workout niet bewerken.');
        }

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

    /**
     * Verwijder een workout.
     */
    public function destroy(Workout $workout)
    {
        // Zorg ervoor dat alleen de eigenaar de workout kan verwijderen
        if ($workout->user_id !== Auth::id()) {
            return redirect()->route('workouts.index')->with('error', 'Je mag deze workout niet verwijderen.');
        }

        $workout->delete();

        return redirect()->route('workouts.index')
            ->with('success', 'Workout succesvol verwijderd.');
    }

    /**
     * Toon een enkele workout.
     */
    public function show(Workout $workout)
    {
        return view('workouts.show', compact('workout'));
    }
}
