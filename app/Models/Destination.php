<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'price',
        'location'
    ];

    public function schedules()
    {
        return $this->hasMany(TripSchedule::class);
    }
}
