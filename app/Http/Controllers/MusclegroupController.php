<?php

namespace App\Http\Controllers;

use App\Models\Musclegroup;
use Illuminate\Http\Request;

class MusclegroupController extends Controller
{
    public function index()
    {
        $musclegroups = Musclegroup::all(); // Haal alle muscle groups op
        return view('musclegroups.index', compact('musclegroups')); // Geef de variabele door aan de view
    }

    public function create()
    {
        return view('musclegroups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $musclegroup = new Musclegroup();
        $musclegroup->name = $request->input('name');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Opslaan van het bestand
            $musclegroup->image = $imagePath; // Opslaan van het bestandspad in de database
        }

        $musclegroup->save();

        return redirect()->route('musclegroups.index');
    }


    public function show(Musclegroup $musclegroup)
    {
        return view('musclegroups.show', compact('musclegroup'));
    }

    public function edit(Musclegroup $musclegroup)
    {
        return view('musclegroups.edit', compact('musclegroup'));
    }

    public function update(Request $request, Musclegroup $musclegroup)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        $musclegroup->update($request->all());

        return redirect()->route('musclegroups.index');
    }

    public function destroy(Musclegroup $musclegroup)
    {
        $musclegroup->delete();
        return redirect()->route('musclegroups.index');
    }
}
