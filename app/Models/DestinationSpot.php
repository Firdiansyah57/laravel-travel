<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationSpot extends Model
{
    protected $fillable = [
        'destination_id',
        'spot_name'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
