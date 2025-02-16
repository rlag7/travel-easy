<?php

namespace Database\Seeders;

use CommunicationSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PersonSeeder::class,
            CustomerSeeder::class,
            EmployeeSeeder::class,
            DepartureSeeder::class,
            DestinationSeeder::class,
            TripSeeder::class,
            BookingSeeder::class,
            UserSeeder::class,
            CommunicationSeeder::class,
        ]);
    }
}
