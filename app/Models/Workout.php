<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Workout extends Model
{
    use HasFactory;

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
}
