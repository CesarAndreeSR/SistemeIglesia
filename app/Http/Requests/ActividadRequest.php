<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActividadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha' => 'required|date',
            'hora' => 'required',
            'lugar' => 'nullable|string|max:255',
            'estado' => 'required|in:pendiente,en_proceso,finalizado',
            'responsables' => 'nullable|array',
            'responsables.*' => 'exists:users,id',
        ];
    }
}
