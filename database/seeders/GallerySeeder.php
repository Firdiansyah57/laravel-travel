<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('gallery')->insert([
            ['image' => 'gallery1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'gallery2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'gallery3.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'gallery4.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'gallery5.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'gallery6.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}