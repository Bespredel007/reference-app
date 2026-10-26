<?php

namespace App\Models;

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
            'time'    => ['required', 'date_format:H:i'],
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
            'time.required'       => 'Оберіть час тренування.',
            'time.date_format'    => 'Вкажіть коректний час.',
        ];
    }
}
