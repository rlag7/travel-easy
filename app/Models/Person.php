<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'passport_details',
        'is_active',
        'remarks',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'person_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'person_id');
    }

}
