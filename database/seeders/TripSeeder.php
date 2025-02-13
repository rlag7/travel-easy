<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripSeeder extends Seeder
{
    public function run()
    {
        Trip::firstOrCreate([
            'id' => 1, // Ensure this ID matches what you reference in the bookings table
        ], [
            'employee_id' => 1, // References the employee created in EmployeeSeeder
            'departure_id' => 1, // References the departure created in DepartureSeeder
            'destination_id' => 1, // References the destination created in DestinationSeeder
            'flight_number' => 'FL123',
            'departure_date' => '2025-03-01',
            'departure_time' => '10:00:00',
            'arrival_date' => '2025-03-01',
            'arrival_time' => '12:00:00',
            'trip_status' => 'scheduled',
            'is_active' => true,
            'remarks' => 'Test trip',
        ]);
    }
}
