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
                'image' => 'bromo.webp',
                'title' => 'Bromo Sunrise Sharing Trip',
                'price' => 350000,
                'quota' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-12',
                'image' => 'Rajaampat.webp',
                'title' => 'Raja Ampat Island Hopping',
                'price' => 3500000,
                'quota' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-15',
                'image' => 'komodo.webp',
                'title' => 'Labuan Bajo & Komodo Island',
                'price' => 2750000,
                'quota' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-18',
                'image' => 'bali.webp',
                'title' => 'Bali Uluwatu Sunset Tour',
                'price' => 650000,
                'quota' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-20',
                'image' => 'tumpaksewu.webp',
                'title' => 'Tumpak Sewu Waterfall Adventure',
                'price' => 550000,
                'quota' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-22',
                'image' => 'dieng.webp',
                'title' => 'Dieng Plateau Golden Sunrise',
                'price' => 450000,
                'quota' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-25',
                'image' => 'ijen.webp',
                'title' => 'Kawah Ijen Blue Fire Tour',
                'price' => 500000,
                'quota' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-27',
                'image' => 'belitung.jpg',
                'title' => 'Belitung Island Hopping',
                'price' => 1200000,
                'quota' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-30',
                'image' => 'rinjani.webp',
                'title' => 'Mount Rinjani Trekking 3D2N',
                'price' => 2800000,
                'quota' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
