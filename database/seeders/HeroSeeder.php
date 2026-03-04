<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hero')->insert([
            [
                'title' => 'Welcome to TripGo. Start your dream journey.',
                'sub_title' => 'Travel to the any corner of the world',
                'image' => 'hero.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
