<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
        TentangKamiSeeder::class,
        TentangKami2Seeder::class,
        TentangKami3Seeder::class,
        GallerySeeder::class,
        // DaftarTripSeeder::class,
        HeroSeeder::class,
        DestinationSeeder::class,
        TripScheduleSeeder::class,
    ]);
    }
}
