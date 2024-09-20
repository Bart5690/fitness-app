<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /**
     * Toon het registratieformulier.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handel de registratie af.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validatie van de invoer inclusief de profielfoto
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validatie voor profielfoto
        ]);

        // Profielfoto verwerken indien aanwezig
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public'); // Opslaan in de 'public' disk
        }

        // Maak de nieuwe gebruiker aan
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => ($request->password),
            'profile_picture' => $profilePicturePath, // Sla het pad van de profielfoto op
        ]);

        // Trigger het Registered event voor e-mailverificatie
        event(new Registered($user));

        // Log de gebruiker automatisch in
        Auth::login($user);

        // Redirect naar een route die verificatie vereist of naar de homepage
        return redirect()->intended('/workouts.index'); // Of naar de homepage of een andere route
    }
}
