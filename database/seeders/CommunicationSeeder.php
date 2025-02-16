<?php

namespace Database\Seeders;

use App\Models\Communication;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CommunicationSeeder extends Seeder
{
    public function run()
    {
        // Assuming you have an Employee model and some employees in the database
        $employee = Employee::first(); // Pick the first employee as the sender

        // Create some sample communications
        Communication::create([
            'title' => 'Message 1',
            'message' => 'This is the first message content.',
            'sent_at' => now(),
            'is_active' => true,
            'remarks' => 'First remarks.',
            'employee_id' => 1,
            'customer_id' => 1,
        ]);

    }
}

