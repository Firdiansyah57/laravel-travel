<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\TripSchedule;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'tanggal' => 'nullable|date'
        ]);

        $tanggal = $request->tanggal ?? today()->toDateString();

        // qyery tampil sdmua data
        // $data = TripSchedule::with(['destination', 'bookings'])
        //     ->when($tanggal, function ($query) use ($tanggal) {
        //         $query->whereDate('trip_date', $tanggal);
        //     })->get();

        // qyery tampil 9 data
        $data = TripSchedule::with(['destination', 'bookings'])
            ->where('trip_date', $tanggal)
            ->get();

        return view('visitor.pages.destinations', compact('data', 'tanggal'));
    }
}
