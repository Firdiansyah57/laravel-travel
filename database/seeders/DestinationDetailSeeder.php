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

    $galleryMap = [
        'bromo' => ['bromo1.webp', 'bromo8.webp', 'bromo9.webp'],
        'rajaampat' => ['rajaampat1.webp', 'rajaampat2.webp', 'rajaampat3.webp'],
        'labuanbajo' => ['labuhanbajo1.webp', 'labuhanbajo2.webp', 'labuhanbajo3.webp'],
        'bali' => ['bali1.webp', 'bali2.webp', 'bali3.webp'],
        'tumpaksewu' => ['tumpaksewu1.webp', 'tumpaksewu2.webp', 'tumpaksewu3.webp'],
        'dieng' => ['dieng1.webp', 'dieng2.webp', 'dieng3.webp'],
        'ijen' => ['ijen1.webp', 'ijen2.webp', 'ijen3.webp'],
        'belitung' => ['belitung1.webp', 'belitung2.webp', 'belitung3.webp'],
        'rinjani' => ['rinjani1.webp', 'rinjani2.webp', 'rinjani3.webp'],
    ];

    foreach ($destinations as $destination) {

        // =========================
        // GALLERY (FIX UTAMA 🔥)
        // =========================
        $images = $galleryMap[$destination->slug] ?? ['default1.jpg'];

        foreach ($images as $img) {
            DestinationGallery::create([
                'destination_id' => $destination->id,
                'image' => $img
            ]);
        }

        // =========================
        // FACILITIES
        // =========================
        DestinationFacility::insert([
            ['destination_id'=>$destination->id,'facility'=>'Transportasi'],
            ['destination_id'=>$destination->id,'facility'=>'Driver / Guide'],
            ['destination_id'=>$destination->id,'facility'=>'Tiket Masuk'],
            ['destination_id'=>$destination->id,'facility'=>'Dokumentasi'],
        ]);

        // =========================
        // SPOTS
        // =========================
        DestinationSpot::insert([
            ['destination_id'=>$destination->id,'spot_name'=>'Spot Wisata 1'],
            ['destination_id'=>$destination->id,'spot_name'=>'Spot Wisata 2'],
            ['destination_id'=>$destination->id,'spot_name'=>'Spot Wisata 3'],
        ]);

        // =========================
        // ITINERARY
        // =========================
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

