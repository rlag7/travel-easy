<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@laravel.com',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'employee',
            'email' => 'employee@laravel.com',
            'password' => Hash::make('123456'),
            'role' => 'employee'
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@laravel.com',
            'password' => Hash::make('123456'),
            'role' => 'user'
        ]);
    }
}
