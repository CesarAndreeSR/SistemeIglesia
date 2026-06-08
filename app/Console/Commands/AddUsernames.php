<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AddUsernames extends Command
{
    protected $signature = 'users:add-usernames';
    protected $description = 'Add usernames to existing users based on their first name';

    public function handle()
    {
        $users = User::whereNull('username')->get();

        if ($users->count() === 0) {
            $this->info('No users without username found.');
            return 0;
        }

        foreach ($users as $user) {
            $username = explode(' ', $user->name)[0];
            $user->username = $username;
            $user->save();
            $this->info("Updated user {$user->name} with username: {$username}");
        }

        $this->info("Successfully updated {$users->count()} users.");
        return 0;
    }
}
