<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangKamiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tentang_kami')->insert([
            [
                'title' => 'Explore The Beauty of Mount Bromo With Us',
                'description' => 'Exotic Bromo adalah tour operator profesional yang berfokus pada perjalanan wisata Gunung Bromo, Tumpak Sewu, dan destinasi terbaik di Jawa Timur. Kami menghadirkan pengalaman perjalanan yang aman, nyaman, dan berkesan dengan pelayanan terbaik serta tim berpengalaman.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}