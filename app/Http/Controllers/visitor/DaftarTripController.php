<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarTrip;

class DaftarTripController extends Controller
{
    public function index(Request $request)
    {

        $query = DaftarTrip::query();

        // FILTER BERDASARKAN TANGGAL
        if ($request->filled('tanggal')) {

            $query->whereDate('tanggal', $request->tanggal);
        }

        // URUTKAN BERDASARKAN TANGGAL TERDEKAT
        $data = $query->orderBy('tanggal', 'asc')->get();

        return view('visitor.pages.daftar_trip', compact('data'));
    }
}
