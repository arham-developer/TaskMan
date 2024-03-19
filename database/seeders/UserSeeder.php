<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
                'name' => 'admin',
                'email' => 'admin@taskm.com',
                'phone' => '0888888888',
                'location' => 'indonesia',
                'about' => 'as admin for test',
                'password' => Hash::make('adminpassword'),
                'created_at' => now(),
                'is_admin' => true,
            ]);
        User::create([
                'name' => 'guest',
                'email' => 'guest@taskm.com',
                'phone' => '999999999999',
                'location' => 'indonesia',
                'about' => 'guest',
                'password' => Hash::make('guest'),
                'created_at' => now(),
                'is_guest' => true,
            ]);
        User::create([
                'name' => 'user',
                'email' => 'user@taskm.com',
                'phone' => '0889999988',
                'location' => 'indonesia',
                'about' => 'as user for test',
                'password' => Hash::make('userpassword'),
                'created_at' => now(),
            ]);
    }
}
