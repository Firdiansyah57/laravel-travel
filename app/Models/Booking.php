<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'trip_schedule_id',
        'name',
        'email',
        'phone',
        'qty',
        'total_price',
        'status'
    ];

    public function schedule()
    {
        return $this->belongsTo(TripSchedule::class,'trip_schedule_id');
    }
}
