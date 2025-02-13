<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country',
        'airport',
        'is_active',
        'remarks',
    ];

    /**
     * Define the relationship between Departure and Trip.
     * A departure can have many trips.
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
