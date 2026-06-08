<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CheckUsers extends Command
{
    protected $signature = 'users:check';
    protected $description = 'Check existing users in the database';

    public function handle()
    {
        $users = User::all(['id', 'name', 'username', 'email', 'estado']);

        $this->table(
            ['ID', 'Nombre', 'Username', 'Email', 'Estado'],
            $users->map(function ($user) {
                return [
                    $user->id,
                    $user->name,
                    $user->username ?? 'NULL',
                    $user->email ?? 'NULL',
                    $user->estado ? 'Activo' : 'Inactivo',
                ];
            })->toArray()
        );

        return 0;
    }
}
