<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\MusclegroupController;
use App\Http\Requests\CreateOrUpdateMusclegroupRequest;
use App\Http\Requests\CreateOrUpdateWorkoutRequest;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;



// Resource route voor Workouts
Route::resource('workouts', WorkoutController::class);

Route::get('/workouts', [WorkoutController::class, 'index'])->name('workouts.index');

Route::get('/workouts/create', [WorkoutController::class, 'create'])->name('workouts.create');

Route::resource('musclegroups', MusclegroupController::class);

Route::post('/workouts', [WorkoutController::class, 'store'])->name('workouts.store');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');


// Route voor uitloggen
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




// Eventueel kun je een homepagina route definiëren:
Route::get('/', function () {
    return redirect()->route('workouts.index'); // Stuur de gebruiker naar de workouts index pagina
});

Route::get('/', function () {
    return view('workouts.index');
})->middleware('auth');

