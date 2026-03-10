<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('gallery')->insert([
            ['image' => 'bromo.webp', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'komodo.webp', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'Rajaampat.webp', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'Ijen.webp', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'bali.webp', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'dieng.webp', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}