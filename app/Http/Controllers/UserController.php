<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showWorkouts(User $user)
    {
        // Haal alle workouts van de opgegeven gebruiker op
        $workouts = $user->workouts; // Dit maakt gebruik van de relatie die je in het User-model hebt ingesteld

        // Stuur de gebruiker en zijn workouts naar de view
        return view('users.workouts', compact('user', 'workouts'));
    }
}
