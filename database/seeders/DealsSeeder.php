<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deal;

class DealsSeeder extends Seeder
{
    public function run(): void
    {
        Deal::create([
            'destination' => 'New York',
            'airline' => 'KLM',
            'price' => 399.99,
            'image' => 'new-york.jpg',
            'available' => true,
        ]);

        Deal::create([
            'destination' => 'Bali',
            'airline' => 'Emirates',
            'price' => 699.99,
            'image' => 'bali.jpg',
            'available' => true,
        ]);

        Deal::create([
            'destination' => 'Parijs',
            'airline' => 'Air France',
            'price' => 99.99,
            'image' => 'paris.jpg',
            'available' => true,
        ]);
    }
}
