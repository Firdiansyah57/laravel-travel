<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangKami2Seeder extends Seeder
{
    public function run(): void
    {
        DB::table('tentang_kami_2')->insert([
            [
                'image' => 'about-bromo.jpg',
                'icon' => 'flaticon-tour-guide',
                'title' => 'Professional Tour Guide',
                'description' => 'Tim guide berpengalaman yang siap membantu perjalanan Anda selama tour berlangsung.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'jeep-bromo.jpg',
                'icon' => 'flaticon-jeep',
                'title' => '4WD Jeep Experience',
                'description' => 'Nikmati pengalaman menjelajah lautan pasir Bromo menggunakan jeep 4WD terbaik.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'sunrise-bromo.jpg',
                'icon' => 'flaticon-sunrise',
                'title' => 'Amazing Sunrise Spot',
                'description' => 'Saksikan golden sunrise terbaik dari Penanjakan dengan view Gunung Bromo dan Semeru.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}