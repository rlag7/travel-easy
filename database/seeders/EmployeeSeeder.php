<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::firstOrCreate([
            'id' => 1, // Ensure this ID matches what you reference in the trips table
        ], [
            'person_id' => 1, // References the person created in PersonSeeder
            'employee_number' => 'EMP123',
            'employee_type' => 'Manager',
            'is_active' => true,
            'remarks' => 'Test employee',
        ]);
    }
}
