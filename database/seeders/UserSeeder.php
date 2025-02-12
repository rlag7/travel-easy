<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Person;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a person for the admin
        $adminPerson = Person::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'date_of_birth' => '1990-01-01',
            'is_active' => true,
        ]);

        // Create the admin user
        User::create([
            'person_id' => $adminPerson->id,
            'username' => 'admin', // Add this line
            'name' => 'Admin',
            'email' => 'admin@laravel.com',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);

        // Create a person for the employee
        $employeePerson = Person::create([
            'first_name' => 'Employee',
            'last_name' => 'User',
            'date_of_birth' => '1990-01-01',
            'is_active' => true,
        ]);

        // Create the employee user
        User::create([
            'person_id' => $employeePerson->id,
            'username' => 'employee', // Add this line
            'name' => 'Employee',
            'email' => 'employee@laravel.com',
            'password' => Hash::make('123456'),
            'role' => 'employee'
        ]);

        // Create a person for the regular user
        $userPerson = Person::create([
            'first_name' => 'Regular',
            'last_name' => 'User',
            'date_of_birth' => '1990-01-01',
            'is_active' => true,
        ]);

        // Create the regular user
        User::create([
            'person_id' => $userPerson->id,
            'username' => 'user', // Add this line
            'name' => 'User',
            'email' => 'user@laravel.com',
            'password' => Hash::make('123456'),
            'role' => 'user'
        ]);

        dd('Seeding completed'); // Debugging line
    }
}
