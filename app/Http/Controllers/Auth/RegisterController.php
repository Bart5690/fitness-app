<?php

// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // De view voor registratie
    }

    public function logout(Request $request)
    {
        auth()->logout(); // Uitloggen van de gebruiker
        return redirect('/workouts')->with('success', 'You have been logged out.'); // Redirect naar de homepagina
    }
    public function __construct()
    {
        $this->middleware('guest');

    }



    public function register(Request $request)
    {
        // Validatie van de input
        $this->validate($request, [
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Gebruiker aanmaken
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Inloggen van de gebruiker
        auth()->login($user);

        // Redirect naar de homepagina
        return redirect('/workouts')->with('success', 'Welcome ' . $user->full_name);
    }
}

