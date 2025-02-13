<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departure;

class DepartureSeeder extends Seeder
{
    public function run()
    {
        Departure::firstOrCreate([
            'id' => 1, // Ensure this ID matches what you reference in the trips table
        ], [
            'country' => 'USA',
            'airport' => 'JFK Airport',
            'is_active' => true,
            'remarks' => 'Test departure',
        ]);
    }
}
