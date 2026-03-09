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
                'tanggal' => '2026-04-12',
                'image' => 'raja-ampat.jpg',
                'title' => 'Raja Ampat Island Hopping',
                'price' => 3500000,
                'quota' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-15',
                'image' => 'labuan-bajo.jpg',
                'title' => 'Labuan Bajo & Komodo Island',
                'price' => 2750000,
                'quota' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-18',
                'image' => 'bali-uluwatu.jpg',
                'title' => 'Bali Uluwatu Sunset Tour',
                'price' => 650000,
                'quota' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-20',
                'image' => 'tumpak-sewu.jpg',
                'title' => 'Tumpak Sewu Waterfall Adventure',
                'price' => 550000,
                'quota' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-22',
                'image' => 'dieng-plateau.jpg',
                'title' => 'Dieng Plateau Golden Sunrise',
                'price' => 450000,
                'quota' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-25',
                'image' => 'kawah-ijen.jpg',
                'title' => 'Kawah Ijen Blue Fire Tour',
                'price' => 500000,
                'quota' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-27',
                'image' => 'belitung-island.jpg',
                'title' => 'Belitung Island Hopping',
                'price' => 1200000,
                'quota' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2026-04-30',
                'image' => 'lombok-rinjani.jpg',
                'title' => 'Mount Rinjani Trekking 3D2N',
                'price' => 2800000,
                'quota' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
