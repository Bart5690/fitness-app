<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CreateOrUpdateMusclegroupRequest;
use App\Http\Requests\CreateOrUpdateWorkoutRequest;

class Musclegroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'musclegroup_workout');
    }
}
