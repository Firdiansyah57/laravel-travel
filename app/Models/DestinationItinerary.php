<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationItinerary extends Model
{
    protected $fillable = [
        'destination_id',
        'time',
        'activity'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
