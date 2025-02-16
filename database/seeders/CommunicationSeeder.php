<?php

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
            'remarks' => 'First remarks.',
            'employee_id' => $employee->id, // Link it to the first employee
        ]);

        Communication::create([
            'title' => 'Message 2',
            'message' => 'This is the second message content.',
            'remarks' => 'Second remarks.',
            'employee_id' => $employee->id,
        ]);
    }
}
