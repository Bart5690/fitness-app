<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\MusclegroupController;
use App\Http\Requests\CreateOrUpdateMusclegroupRequest;
use App\Http\Requests\CreateOrUpdateWorkoutRequest;



// Resource route voor Workouts
Route::resource('workouts', WorkoutController::class);

Route::resource('musclegroups', MusclegroupController::class);

Route::post('/workouts', [WorkoutController::class, 'store'])->name('workouts.store');




// Eventueel kun je een homepagina route definiëren:
Route::get('/', function () {
    return redirect()->route('workouts.index'); // Stuur de gebruiker naar de workouts index pagina
});
