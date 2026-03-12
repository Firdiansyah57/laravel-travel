<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangKami3Seeder extends Seeder
{
    public function run(): void
    {
        DB::table('tentang_kami_3')->insert([
            [
                'image' => 'client1.jpg',
                'name' => 'Rizal',
                'rating' => 5,
                'description' => 'Trip Bromo sangat seru! Kami dijemput dini hari naik jeep menuju Penanjakan untuk melihat sunrise. Setelah itu lanjut ke Kawah Bromo dan Pasir Berbisik. Pengalaman yang benar-benar tak terlupakan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'client2.jpg',
                'name' => 'Rahmat',
                'rating' => 5,
                'description' => 'Liburan ke Bali sangat menyenangkan. Kami diajak mengunjungi Tanah Lot saat sunset, lalu ke Ubud dan Tegalalang Rice Terrace. Guide juga sangat ramah dan informatif.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'client3.jpg',
                'name' => 'Rizky',
                'rating' => 5,
                'description' => 'Pendakian ke Kawah Ijen menjadi pengalaman luar biasa. Kami berangkat tengah malam untuk melihat fenomena blue fire, lalu menikmati sunrise di puncak kawah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'client4.jpg',
                'name' => 'Dimas',
                'rating' => 5,
                'description' => 'Trip ke Dieng sangat berkesan. Kami melihat sunrise di Bukit Sikunir, lalu mengunjungi Telaga Warna, Kawah Sikidang, dan Candi Arjuna. Udara dinginnya bikin suasana makin seru.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'client5.jpg',
                'name' => 'Andi',
                'rating' => 5,
                'description' => 'Pengalaman island hopping di Labuan Bajo sangat luar biasa. Kami mengunjungi Pulau Padar, Pink Beach, dan Pulau Komodo. Snorkelingnya juga keren sekali.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'client6.jpg',
                'name' => 'Fajar',
                'rating' => 5,
                'description' => 'Raja Ampat benar-benar indah! Kami snorkeling di beberapa spot dengan air yang sangat jernih dan melihat banyak ikan warna-warni serta terumbu karang yang masih sangat alami.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'client7.jpg',
                'name' => 'Budi',
                'rating' => 4,
                'description' => 'Trip Malang dan Bromo sangat menyenangkan. Selain ke Bromo, kami juga diajak ke Coban Rondo dan Batu Night Spectacular. Jadwalnya fleksibel dan nyaman.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'client8.jpg',
                'name' => 'Agus',
                'rating' => 5,
                'description' => 'Tour ke Bali dan Nusa Penida sangat berkesan. Kami mengunjungi Kelingking Beach, Broken Beach, dan Angel’s Billabong. Pemandangannya luar biasa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'client9.jpg',
                'name' => 'Hendra',
                'rating' => 5,
                'description' => 'Paket Bromo dan Kawah Ijen sangat direkomendasikan. Dalam dua hari kami bisa menikmati sunrise Bromo dan blue fire di Ijen. Semua diatur dengan sangat baik.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
