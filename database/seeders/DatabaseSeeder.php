<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('superadmin123Aa*'),
        ]);

        $role = Role::create([
            'name' => 'Super Admin',
            'description' => 'Ini adalah super admin',
        ]);

        $user->roles()->save($role);

        Role::create([
            'name' => 'Admin',
            'description' => 'Ini Admin',
        ]);

        $user->profile()->create([
            'full_name'     => 'Super Admin',
            'image'         => 'default.jpg',
            'jenis_kelamin' => 1,
        ]);
    }
}
