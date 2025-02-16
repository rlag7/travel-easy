<?php

namespace Database\Seeders;

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
            CommunicationSeeder::class,
            UserSeeder::class,
        ]);
    }
}
