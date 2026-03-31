<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('destinations')->insert([
            [
                'title' => 'Bromo Sunrise 1Day Tour',
                'slug' => Str::slug('Bromo Sunrise 1Day Tour'),
                'image' => 'bromo.webp',
                'description' => 'Nikmati sunrise terbaik di Gunung Bromo dengan jeep tour.',
                'price' => 350000,
                'location' => 'Malang, Jawa Timur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Raja Ampat Island 3D2N',
                'slug' => Str::slug('Raja Ampat Island 3D2N'),
                'image' => 'rajaampat.webp',
                'description' => 'Explore surga bawah laut Raja Ampat selama 3 hari.',
                'price' => 4500000,
                'location' => 'Papua Barat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Labuan Bajo & Komodo Island 3D2N',
                'slug' => Str::slug('Labuan Bajo & Komodo Island 3D2N'),
                'image' => 'komodo.webp',
                'description' => 'Petualangan melihat Komodo Dragon dan island hopping.',
                'price' => 3500000,
                'location' => 'Labuan Bajo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bali Tour 3D2N',
                'slug' => Str::slug('Bali Tour 3D2N'),
                'image' => 'bali.webp',
                'description' => 'Tour eksklusif menjelajahi tempat wisata terbaik di Bali.',
                'price' => 3500000,
                'location' => 'Bali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tumpak Sewu Waterfall Adventure 1Day Tour',
                'slug' => Str::slug('Tumpak Sewu Waterfall Adventure 1Day Tour'),
                'image' => 'tumpaksewu.webp',
                'description' => 'Petualangan melihat air terjun paling indah di Indonesia.',
                'price' => 400000,
                'location' => 'Lumajang, Jawa Timur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dieng Plateau 3D2N',
                'slug' => Str::slug('Dieng Plateau 3D2N'),
                'image' => 'dieng.webp',
                'description' => 'Wisata negeri di atas awan Dieng Plateau.',
                'price' => 2500000,
                'location' => 'Wonosobo, Jawa Tengah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kawah Ijen Blue Fire 1Day Tour',
                'slug' => Str::slug('Kawah Ijen Blue Fire 1Day Tour'),
                'image' => 'ijen.webp',
                'description' => 'Melihat fenomena blue fire langka di Kawah Ijen.',
                'price' => 400000,
                'location' => 'Banyuwangi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Belitung Island 3D2N',
                'slug' => Str::slug('Belitung Island 3D2N'),
                'image' => 'belitung.webp',
                'description' => 'Explore pantai granit indah di Pulau Belitung.',
                'price' => 3000000,
                'location' => 'Belitung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mount Rinjani Trekking 3D2N',
                'slug' => Str::slug('Mount Rinjani Trekking 3D2N'),
                'image' => 'rinjani.webp',
                'description' => 'Pendakian Gunung Rinjani selama 3 hari 2 malam.',
                'price' => 3000000,
                'location' => 'Lombok',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
