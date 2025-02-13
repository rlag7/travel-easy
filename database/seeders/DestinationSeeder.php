<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    public function run()
    {
        Destination::firstOrCreate([
            'id' => 1, // Ensure this ID matches what you reference in the trips table
        ], [
            'country' => 'UK',
            'airport' => 'Heathrow Airport',
            'is_active' => true,
            'remarks' => 'Test destination',
        ]);
    }
}
