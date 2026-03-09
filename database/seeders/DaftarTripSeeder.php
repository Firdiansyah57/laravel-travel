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
                'title' => 'Bromo Sunrise 1Day Tour',
                'price' => 350000,
                'quota' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-12',
                'image' => 'Rajaampat.webp',
                'title' => 'Raja Ampat Island 3D2N',
                'price' => 4500000,
                'quota' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-15',
                'image' => 'komodo.webp',
                'title' => 'Labuan Bajo & Komodo Island 3D2N',
                'price' => 3500000,
                'quota' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-18',
                'image' => 'bali.webp',
                'title' => 'Bali Tour 3D2N',
                'price' => 3500000,
                'quota' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-20',
                'image' => 'tumpaksewu.webp',
                'title' => 'Tumpak Sewu Waterfall Adventure 1Day Tour',
                'price' => 400000,
                'quota' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-22',
                'image' => 'dieng.webp',
                'title' => 'Dieng Plateau 3D2N',
                'price' => 2500000,
                'quota' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-25',
                'image' => 'Ijen.webp',
                'title' => 'Kawah Ijen Blue Fire 1Day Tour',
                'price' => 400000,
                'quota' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-27',
                'image' => 'belitung.webp',
                'title' => 'Belitung Island 3D2N',
                'price' => 3000000,
                'quota' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-30',
                'image' => 'rinjani.webp',
                'image' => 'rinjani.webp',
                'title' => 'Mount Rinjani Trekking 3D2N',
                'price' => 3000000,
                'quota' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
