<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarTripSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('daftar_trip')->insert([
            [
                'tanggal' => '2026-04-10',
                'image' => 'bromo-sunrise.jpg',
                'title' => 'Bromo Sunrise Sharing Trip',
                'price' => 350000,
                'quota' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-15',
                'image' => 'bromo-private.jpg',
                'title' => 'Private Trip Bromo Midnight',
                'price' => 2500000,
                'quota' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-20',
                'image' => 'bromo-tumpaksewu.jpg',
                'title' => 'Bromo & Tumpak Sewu 2D1N',
                'price' => 1250000,
                'quota' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}