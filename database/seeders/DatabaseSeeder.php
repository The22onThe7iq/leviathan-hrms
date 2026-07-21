<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create the Admin Role (Bound specifically to our JWT api guard)
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'api']);

        // 2. Create the Master User Account
        $admin = User::create([
            'name' => 'Sajjad',
            'email' => 'admin@leviathan.local',
            'password' => Hash::make('password123'),
        ]);

        // 3. Bind the Role to the User
        $admin->assignRole($adminRole);
    }
}
