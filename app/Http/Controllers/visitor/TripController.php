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

    if ($tanggal < now()->toDateString()) {
        return redirect()->route('destinations.index')
            ->with('error','Tanggal trip sudah lewat');
    }

    $data = TripSchedule::with(['destination','bookings'])
        ->whereDate('trip_date',$tanggal)
        // ->whereDate('trip_date','>=', now())
        ->get();

    return view('visitor.pages.destinations', compact('data','tanggal'));
}


    public function detail($id)
{
    $trip = TripSchedule::with([
        'destination.galleries',
        'destination.facilities',
        'destination.spots',
        'destination.itineraries',
        'bookings'
    ])->findOrFail($id);

    $booked = $trip->bookings->sum('qty');
    $sisaQuota = $trip->quota - $booked;

    return view('visitor.detail',compact(
        'trip',
        'sisaQuota'
    ));
}

}
