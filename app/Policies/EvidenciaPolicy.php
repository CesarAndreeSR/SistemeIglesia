<?php

namespace App\Policies;

use App\Models\Evidencia;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvidenciaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Evidencia $evidencia): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Evidencia $evidencia): bool
    {
        return $user->id === $evidencia->subido_por;
    }

    public function delete(User $user, Evidencia $evidencia): bool
    {
        return $user->id === $evidencia->subido_por;
    }
}
