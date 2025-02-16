<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Communication extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'employee_id',
        'message',
        'sent_at',
        'is_active',
        'remarks',
    ];

    protected $casts = [
        'sent_at' => 'datetime',  // This ensures 'sent_at' is treated as a DateTime object
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
