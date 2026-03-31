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

    public function galleries()
    {
        return $this->hasMany(DestinationGallery::class);
    }

    public function facilities()
    {
        return $this->hasMany(DestinationFacility::class);
    }

    public function spots()
    {
        return $this->hasMany(DestinationSpot::class);
    }

    public function itineraries()
    {
        return $this->hasMany(DestinationItinerary::class);
    }
}
