<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\MusclegroupController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

/**
 * Algemene routes
 */

// Route voor de homepage, stuurt door naar de workouts index.
Route::get('/', function () {
    return redirect()->route('workouts.index'); // Stuur door naar workouts als homepagina
});

// Uitloggen route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/**
 * Workout routes
 */
Route::middleware(['auth'])->group(function () {
    // Resource route voor Workouts (bevat create, store, edit, update, destroy)
    Route::resource('workouts', WorkoutController::class);

    // Specifieke route voor workouts van een gebruike
    Route::get('/user/{user}/workouts', [WorkoutController::class, 'userWorkouts'])->name('user.workouts');
});



// Route om de workouts van een specifieke gebruiker te tonen
Route::get('/user/{user}/workouts', [UserController::class, 'showWorkouts'])->name('user.workouts');


/**
 * Musclegroups routes
 */
Route::middleware(['auth'])->group(function () {
    // Resource route voor Muscle Groups (bevat index, create, store, edit, update, destroy)
    Route::resource('musclegroups', MusclegroupController::class);
});

/**
 * Auth routes (Registratie, Login, etc.)
 */

// Registratie routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

/**
 * Verificatie routes (indien nodig)
 */

// E-mail verificatie reminder route
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// E-mail verificatie route
Route::get('/email/verify/{id}/{hash}', function () {
    // Placeholder, Laravel heeft standaard verificatielogica
})->middleware(['auth', 'signed'])->name('verification.verify');

// Route voor opnieuw versturen van verificatie e-mail
Route::post('/email/resend', [RegisterController::class, 'resendVerificationEmail'])->middleware('auth')->name('verification.resend');
