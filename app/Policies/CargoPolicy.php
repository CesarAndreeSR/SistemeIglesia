<?php

namespace App\Policies;

use App\Models\Cargo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CargoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Cargo $cargo): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Cargo $cargo): bool
    {
        return true;
    }

    public function delete(User $user, Cargo $cargo): bool
    {
        return $cargo->users()->count() === 0;
    }
}
