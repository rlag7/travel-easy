<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    // Define which attributes are mass assignable
    protected $fillable = [
        'employee_id',
        'departure_id',
        'destination_id',
        'flight_number',
        'departure_date',
        'departure_time',
        'arrival_date',
        'arrival_time',
        'trip_status',
        'is_active',
        'remarks',
    ];

    // Relationship with the employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Relationship with the departure location
    public function departure()
    {
        return $this->belongsTo(Departure::class);
    }

    // Relationship with the destination
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
