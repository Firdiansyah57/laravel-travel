<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    public function run(): void
{
    DB::table('gallery')->insert([
        ['image' => 'bali.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'bali1.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'bali2.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'bali3.webp', 'created_at' => now(), 'updated_at' => now()],

        ['image' => 'belitung.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'belitung1.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'belitung2.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'belitung3.webp', 'created_at' => now(), 'updated_at' => now()],

        ['image' => 'bromo.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'bromo1.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'bromo2.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'bromo3.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'bromo4.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'bromo8.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'bromo9.webp', 'created_at' => now(), 'updated_at' => now()],

        ['image' => 'dieng.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'dieng1.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'dieng2.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'dieng3.webp', 'created_at' => now(), 'updated_at' => now()],

        ['image' => 'ijen.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'ijen1.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'ijen2.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'ijen3.webp', 'created_at' => now(), 'updated_at' => now()],

        ['image' => 'komodo.webp', 'created_at' => now(), 'updated_at' => now()],

        ['image' => 'labuhanbajo1.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'labuhanbajo2.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'labuhanbajo3.webp', 'created_at' => now(), 'updated_at' => now()],

        ['image' => 'Rajaampat.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'rajaampat1.webp', 'created_at' => now(), 'updated_at' => now()],
        ['image' => 'rajaampat2.webp', 'created_at' => now(), 'updated_at' => now()],
    ]);
}
}
