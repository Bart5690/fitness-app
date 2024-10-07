<!-- resources/views/emails/workout-details.blade.php -->

<h1>Workout Details</h1>

<p><strong>Oefening:</strong> {{ $workout->exercise }}</p>
<p><strong>Sets:</strong> {{ $workout->sets }}</p>
<p><strong>Reps:</strong> {{ $workout->reps }}</p>
<p><strong>Gewicht:</strong> {{ $workout->weight }} kg</p>
<p><strong>Beschrijving:</strong> {{ $workout->description }}</p>

<p>Deze workout is toegevoegd door {{ $workout->user->name }}.</p>
