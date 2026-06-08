<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = [
        'creado_por',
        'titulo',
        'descripcion',
        'fecha',
        'hora',
        'lugar',
        'estado',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    public function creador()
    {
        return $this->belongsTo(User::class, 'creado_por');
    }

    public function responsables()
    {
        return $this->belongsToMany(User::class, 'actividad_user');
    }

    public function evidencias()
    {
        return $this->hasMany(Evidencia::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
}
