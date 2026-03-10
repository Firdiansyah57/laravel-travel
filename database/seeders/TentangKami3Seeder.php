<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangKami3Seeder extends Seeder
{
    public function run(): void
    {
        DB::table('tentang_kami_3')->insert([
            [
                'image' => 'client1.jpg',
                'name' => 'Rizal',
                'rating' => 5,
                'description' => 'Perjalanan yang luar biasa! Sunrise Bromo sangat indah dan pelayanan tim sangat profesional.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'client2.jpg',
                'name' => 'Rahmat',
                'rating' => 5,
                'description' => 'Tour sangat terorganisir dengan baik. Jeep bersih dan guide sangat ramah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'client3.jpg',
                'name' => 'Rizky',
                'rating' => 5,
                'description' => 'Pengalaman yang menyenangkan dan pemandangan yang luar biasa. Highly recommended!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}