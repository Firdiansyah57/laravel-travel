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
                'icon' => 'fa fa-whatsapp',
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fa fa-twitter',
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fa fa-instagram',
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
