<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class PaymentController extends Controller
{
    public function show($id)
    {
        $booking = Booking::with('tripSchedule.destination')
            ->findOrFail($id);

        return view('visitor.pages.pembayaran', compact('booking'));
    }
}
