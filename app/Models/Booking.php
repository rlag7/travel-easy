<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'trip_id',
        'seat_number',
        'purchase_date',
        'purchase_time',
        'booking_status',
        'price',
        'quantity',
        'special_requests',
        'is_active',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
