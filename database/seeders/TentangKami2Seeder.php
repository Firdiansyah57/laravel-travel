<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangKami2Seeder extends Seeder
{
    public function run(): void
    {
        DB::table('tentang_kami_2')->insert([
            [
                'image' => 'about-bromo.jpg',
                'icon' => 'flaticon-tour-guide',
                'title' => 'Tim Profesional Terbaik',
                'description' => 'Nikmati liburan istimewa bersama tim profesional kami, dari tour leader sekaligus fotografer hingga tim jeep dan staf siap melayani dengan prima.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'jeep-bromo.jpg',
                'icon' => 'flaticon-jeep',
                'title' => 'Pilihan Terbaik Untukmu',
                'description' => 'Nikmati liburan tak terlupakan dengan pilihan terbaik, harga terjangkau, dan layanan terbaik yang telah memuaskan ratusan pelanggan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'sunrise-bromo.jpg',
                'icon' => 'flaticon-sunrise',
                'title' => 'Konsultasi Jadwal Fleksibel',
                'description' => 'Kami Menawarkan Konsultasi Jadwal Fleksibel yang Memudahkan Anda Menyesuaikan Waktu Perjalanan Sesuai Keinginan dan Kebutuhan Anda.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

             [
                'image' => 'sunrise-bromo.jpg',
                'icon' => 'flaticon-sunrise',
                'title' => 'Solusi Wisata Individual/Grup',
                'description' => 'Mau berangkat sendiri? bareng pacar? bareng teman-teman? kita punya semua paketnya!.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

             [
                'image' => 'sunrise-bromo.jpg',
                'icon' => 'flaticon-sunrise',
                'title' => 'Harga Kompetitif dan Terjangkau',
                'description' => 'Kami menyediakan paket trip terjangkau yang memberikan Anda pengalaman maksimal dengan harga minimal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
