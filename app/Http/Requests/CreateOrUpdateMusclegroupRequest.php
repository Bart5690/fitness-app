<?php

// app/Http/Requests/CreateOrUpdateMusclegroupRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateMusclegroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
        ];
    }
}
