<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Requests\CreateOrUpdateMusclegroupRequest;
use App\Http\Requests\CreateOrUpdateWorkoutRequest;



class Workout extends Model
{
    use HasFactory;

    // De kolommen in de database die ingevuld kunnen worden via mass assignment
    protected $fillable = [
        'exercise',  // Naam van de oefening
        'sets',      // Aantal sets
        'reps',      // Aantal herhalingen
        'weight',    // Gewicht
        'description', // Beschrijving
        'user_id',   // De id van de gebruiker die de workout heeft aangemaakt
        'slug',      // De slug van de workout
    ];

    public function user()
    {
        return $this->belongsTo(User::class);  // Stel dat een workout bij een gebruiker hoort
    }
    public function musclegroups()
    {
        return $this->belongsToMany(Musclegroup::class, 'musclegroup_workout');
    }
}
