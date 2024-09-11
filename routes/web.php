<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;

// Resource route voor Workouts
Route::resource('workouts', WorkoutController::class);

// Eventueel kun je een homepagina route definiëren:
Route::get('/', function () {
    return redirect()->route('workouts.index'); // Stuur de gebruiker naar de workouts index pagina
});
