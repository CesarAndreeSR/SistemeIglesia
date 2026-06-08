<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
   public function rules(): array
{
    $userId = $this->route('user'); // o 'id' según tu ruta

    $rules = [
        'name' => 'required|string|max:255',
        'username' => [
            'required',
            'string',
            'max:255',
            Rule::unique('users', 'username')->ignore($userId),
        ],
        'email' => [
            'nullable',
            'string',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore($userId),
        ],
        'telefono' => 'nullable|string|max:20',
        'cargo_id' => 'nullable|exists:cargos,id',
        'estado' => 'boolean',
    ];

    $rules['password'] = $this->isMethod('post')
        ? 'required|string|min:8|confirmed'
        : 'nullable|string|min:8|confirmed';

    return $rules;
}
}
