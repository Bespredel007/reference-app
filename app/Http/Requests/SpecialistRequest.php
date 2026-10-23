<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SpecialistRequest extends FormRequest
{

    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'photo' => ['nullable', 'string'],
            'name' => ['required', 'string', 'max:50'],
            'specialty' => ['required', 'string', 'max:100'],
            'experience' => ['required', 'integer', 'min:0'],
            'phone' => ['required', 'string', 'max:15'],
            'price' => ['required', 'integer', 'min:0'],
        ];
    }

}
