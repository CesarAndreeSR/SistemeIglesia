<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsistenciaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'actividad_id' => 'required|exists:actividades,id',
            'user_id' => 'required|exists:users,id',
            'asistio' => 'required|boolean',
        ];
    }
}
