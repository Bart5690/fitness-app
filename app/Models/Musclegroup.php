<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musclegroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function workouts()
    {
        return $this->belongsToMany(Workout::class);
    }

//    public function musclegroups()
//    {
//        return $this->belongsToMany(Musclegroup::class);
//    }
}
