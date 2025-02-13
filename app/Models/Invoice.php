<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'invoice_number',
        'invoice_date',
        'amount_ex_vat',
        'vat',
        'amount_inc_vat',
        'invoice_status',
        'is_active',
        'remarks',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
