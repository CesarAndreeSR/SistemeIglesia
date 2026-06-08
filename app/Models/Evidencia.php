<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'actividad_id',
        'subido_por',
        'archivo',
        'tipo',
        'descripcion',
    ];

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    public function subidor()
    {
        return $this->belongsTo(User::class, 'subido_por');
    }
}
