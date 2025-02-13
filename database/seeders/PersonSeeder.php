<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonSeeder extends Seeder
{
    public function run()
    {
        Person::firstOrCreate([
            'id' => 1, // Ensure this ID matches what you reference elsewhere
        ], [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'is_active' => true,
            'remarks' => 'Test person',
        ]);
    }
}
