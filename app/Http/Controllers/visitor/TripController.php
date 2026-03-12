<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use App\Models\TripSchedule;
use Illuminate\Http\Request;

class TripController extends Controller
{

    public function home()
    {
        $trips = TripSchedule::with('destination')
            ->latest()
            ->limit(6)
            ->get();

        return view('home',compact('trips'));
    }


    public function destinations(Request $request)
    {
        $tanggal = $request->tanggal ?? now()->toDateString();

        $data = TripSchedule::with(['destination','bookings'])
            ->whereDate('trip_date',$tanggal)
            ->get();

        return view('visitor.pages.destinations', compact('data','tanggal'));
    }


    public function detail($id)
    {
        $trip = TripSchedule::with(['destination','bookings'])
            ->findOrFail($id);

        return view('trips.detail',compact('trip'));
    }

}
