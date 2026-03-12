<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Destination;
use App\Models\TripSchedule;
use Carbon\Carbon;

class GenerateTripSchedule extends Command
{
    protected $signature = 'trip:generate';
    protected $description = 'Generate trip schedule automatically';

    public function handle()
    {
        $destinations = Destination::all();

        foreach ($destinations as $destination) {

            $lastSchedule = TripSchedule::where('destination_id',$destination->id)
                ->orderBy('trip_date','desc')
                ->first();

            $lastDate = $lastSchedule
                ? Carbon::parse($lastSchedule->trip_date)
                : Carbon::today();

            $targetDate = Carbon::today()->addDays(30);

            while ($lastDate < $targetDate) {

                $lastDate->addDay();

                TripSchedule::firstOrCreate([
                    'destination_id' => $destination->id,
                    'trip_date' => $lastDate
                ],[
                    'quota' => rand(6,12)
                ]);

            }

        }

        $this->info('Trip schedule generated successfully');

    }
}
