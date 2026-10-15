<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email'],
            'date'    => ['required', 'date', 'after_or_equal:today'],
            'message' => ['required', 'string', 'min:5'],
        ];
    }

    public function messages(): array
    {
        return [
            'date.required'       => 'Оберіть дату тренування.',
            'date.date'           => 'Введіть коректну дату.',
            'date.after_or_equal' => 'Дата тренування не може бути в минулому.',
            'name.required'    => 'Поле «Ім’я» є обов’язковим.',
            'email.required'   => 'Поле «Email» є обов’язковим.',
            'email.email'      => 'Введіть коректну електронну адресу.',
            'message.required' => 'Поле «Повідомлення» не може бути порожнім.',
            'message.min'      => 'Повідомлення має містити щонайменше 5 символів.',
        ];
    }
}
