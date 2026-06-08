<?php

namespace App\Policies;

use App\Models\Asistencia;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AsistenciaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Asistencia $asistencia): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Asistencia $asistencia): bool
    {
        return true;
    }

    public function delete(User $user, Asistencia $asistencia): bool
    {
        return true;
    }
}
