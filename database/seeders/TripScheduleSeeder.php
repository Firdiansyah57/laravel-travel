<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\TripSchedule;
use Carbon\Carbon;

class TripScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = Destination::all();

        foreach ($destinations as $destination) {

            for ($i = 0; $i <= 30; $i++) {

                TripSchedule::create([
                    'destination_id' => $destination->id,
                    'trip_date' => Carbon::today()->addDays($i),
                    'quota' => rand(6,12)
                ]);

            }

        }
    }
}
