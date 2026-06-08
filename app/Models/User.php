<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'cargo_id',
        'name',
        'username',
        'email',
        'telefono',
        'estado',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'estado' => 'boolean',
        ];
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function actividadesCreadas()
    {
        return $this->hasMany(Actividad::class, 'creado_por');
    }

    public function actividadesAsignadas()
    {
        return $this->belongsToMany(Actividad::class, 'actividad_user');
    }

    public function evidenciasSubidas()
    {
        return $this->hasMany(Evidencia::class, 'subido_por');
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
}
