<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Workout extends Model
{
    use HasFactory;

    // De kolommen in de database die ingevuld kunnen worden via mass assignment
    protected $fillable = [
        'exercise',  // Naam van de oefening
        'sets',      // Aantal sets
        'reps',      // Aantal herhalingen
        'weight',    // Gewicht
    ];

    public function user()
    {
        return $this->belongsTo(User::class);  // Stel dat een workout bij een gebruiker hoort
    }
    public function musclegroup()
    {
        return $this->belongsTo(Musclegroup::class);
    }
}
