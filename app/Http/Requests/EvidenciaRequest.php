<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvidenciaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'actividad_id' => 'required|exists:actividades,id',
            'archivo' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:10240',
            'tipo' => 'required|in:imagen,pdf',
            'descripcion' => 'nullable|string',
        ];
    }
}
