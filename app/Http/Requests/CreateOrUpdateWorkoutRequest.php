<?php

// app/Http/Requests/CreateOrUpdateWorkoutRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateOrUpdateWorkoutRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'exercise' => 'required|string|max:255',
            'sets' => 'required|integer',
            'reps' => 'required|integer',
            'weight' => 'nullable|numeric',
            'description' => 'nullable|string',
            'musclegroups' => 'required|array', // Zorg ervoor dat er spiergroepen zijn geselecteerd
            'musclegroups.*' => 'exists:musclegroups,id', // Zorg ervoor dat elke geselecteerde spiergroep bestaat

        ];
    }

}
