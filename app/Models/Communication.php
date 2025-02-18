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
        'sent_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
<<<<<<< HEAD

=======
>>>>>>> c387c2e77edf482a9b26a006fe040bb76bb55087
}
