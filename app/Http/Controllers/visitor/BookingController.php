<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\TripSchedule;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $schedule = TripSchedule::with('destination')->findOrFail($request->schedule_id);

        $total = $schedule->destination->price * $request->qty;

        Booking::create([
            'trip_schedule_id' => $schedule->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'qty' => $request->qty,
            'total_price' => $total,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success','Booking berhasil!');
    }
}
