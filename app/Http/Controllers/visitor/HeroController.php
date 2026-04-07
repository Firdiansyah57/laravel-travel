<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\TripSchedule;
use App\Models\TentangKami2;
use App\Models\TentangKami3;
use App\Models\Gallery;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::first(); // ambil 1 data saja (hero utama)


        $tanggal = $request->tanggal ?? today()->toDateString();
        $data = TripSchedule::with(['destination', 'bookings'])
            ->where('trip_date', $tanggal)
            ->take(3)
            ->get();

        $trips = TripSchedule::with(['destination', 'bookings'])
            ->where('trip_date', now()->toDateString())
            ->limit(3)
            ->get();

        foreach ($trips as $trip) {
            $terbooking = $trip->bookings->sum('jumlah_orang');
            $trip->sisaQuota = $trip->quota - $terbooking;
        }
        
        $tentang_kami_2 = TentangKami2::all();
        $tentang_kami_3 = TentangKami3::all();
        $gallery = Gallery::orderBy('image')->take(5)->get();

        return view('visitor.index', compact('hero', 'data', 'tentang_kami_2', 'tentang_kami_3', 'gallery'));
    }
}
