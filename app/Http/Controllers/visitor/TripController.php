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

        return view('home', compact('trips'));
    }


    public function destinations(Request $request)
    {
        $tanggal = $request->tanggal ?? now()->toDateString();

        // 🔥 VALIDASI TANGGAL
        if ($tanggal < now()->toDateString()) {
            return redirect()->back()
                ->with('error', 'Tanggal trip sudah lewat');
        }

        // 🔥 AMBIL DATA
        $data = TripSchedule::with(['destination', 'bookings'])
            ->whereDate('trip_date', $tanggal)
            ->get();

        return view('visitor.pages.destinations', compact('data', 'tanggal'));
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

        // 🔥 HITUNG QUOTA
        $booked = $trip->bookings()
            ->whereIn('status', ['paid', 'dp50%']) // HANYA hitung yang sudah bayar/DP
            ->sum('qty');
        $sisaQuota = $trip->destination->quota - $booked;

        return view('visitor.detail', compact(
            'trip',
            'sisaQuota'
        ));
    }


    // 🔥 REALTIME QUOTA (WAJIB ADA)
    public function checkQuota($id)
    {
        $trip = TripSchedule::with('destination', 'bookings')->findOrFail($id);

        $booked = $trip->bookings()
            ->whereIn('status', ['paid', 'dp50%']) // HANYA hitung yang sudah bayar/DP
            ->sum('qty');
        $sisa = $trip->destination->quota - $booked;

        return response()->json([
            'quota' => $sisa
        ]);
    }
}
