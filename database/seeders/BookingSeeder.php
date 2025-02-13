<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    public function run()
    {
        Booking::firstOrCreate([
            'id' => 1, // Ensure this ID is unique
        ], [
            'customer_id' => 1, // References the customer created in CustomerSeeder
            'trip_id' => 1, // References the trip created in TripSeeder
            'seat_number' => 'A12',
            'purchase_date' => now(),
            'purchase_time' => now(),
            'booking_status' => 'confirmed',
            'price' => 100.00,
            'quantity' => 1,
            'special_requests' => 'Window seat',
            'is_active' => true,
        ]);
    }
}
