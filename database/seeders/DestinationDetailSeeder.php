<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\DestinationGallery;
use App\Models\DestinationFacility;
use App\Models\DestinationSpot;
use App\Models\DestinationItinerary;

class DestinationDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $destinations = Destination::all();

    foreach ($destinations as $destination) {

        // Gallery
        DestinationGallery::insert([
            ['destination_id'=>$destination->id,'image'=>$destination->image],
            ['destination_id'=>$destination->id,'image'=>$destination->image],
            ['destination_id'=>$destination->id,'image'=>$destination->image],
        ]);

        // Facilities
        DestinationFacility::insert([
            ['destination_id'=>$destination->id,'facility'=>'Transportasi'],
            ['destination_id'=>$destination->id,'facility'=>'Driver / Guide'],
            ['destination_id'=>$destination->id,'facility'=>'Tiket Masuk'],
            ['destination_id'=>$destination->id,'facility'=>'Dokumentasi'],
        ]);

        // Spots
        DestinationSpot::insert([
            ['destination_id'=>$destination->id,'spot_name'=>'Spot Wisata 1'],
            ['destination_id'=>$destination->id,'spot_name'=>'Spot Wisata 2'],
            ['destination_id'=>$destination->id,'spot_name'=>'Spot Wisata 3'],
        ]);

        // Itinerary
        DestinationItinerary::insert([
            [
                'destination_id'=>$destination->id,
                'time'=>'06:00',
                'activity'=>'Penjemputan peserta'
            ],
            [
                'destination_id'=>$destination->id,
                'time'=>'08:00',
                'activity'=>'Perjalanan menuju lokasi wisata'
            ],
            [
                'destination_id'=>$destination->id,
                'time'=>'10:00',
                'activity'=>'Explore destinasi'
            ]
        ]);
    }
}
}
