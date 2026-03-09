<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarTripController extends Controller
{
    public function index()
    {
        return view('visitor.pages.daftar_trip');
    }
}
