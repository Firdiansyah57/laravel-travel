<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\TripSchedule;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // 🔹 HALAMAN RESERVASI
    public function create($id)
    {
        $trip = TripSchedule::with(['destination', 'bookings'])
            ->findOrFail($id);

        $booked = $trip->bookings->sum('qty');
        $sisaQuota = $trip->quota - $booked;

        return view('visitor.pages.reservasi', compact('trip', 'sisaQuota'));
    }

    // 🔹 SIMPAN BOOKING
    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'qty' => 'required|integer|min:1'
        ]);

        $trip = TripSchedule::with('destination', 'bookings')
            ->findOrFail($request->schedule_id);

        // 🔥 HITUNG QUOTA
        $booked = $trip->bookings->sum('qty');
        $sisa = $trip->destination->quota - $booked;

        // 🔥 ANTI OVERBOOKING
        if ($request->qty > $sisa) {
            return back()->with('error', 'Kuota tidak cukup');
        }

        // 🔥 HITUNG TOTAL
        $price = $trip->destination->price;
        $total = $price * $request->qty;

        // 🔥 SIMPAN BOOKING
        $booking = \App\Models\Booking::create([
            'user_id' => auth()->id(),
            'trip_schedule_id' => $trip->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'qty' => $request->qty,
            'total_price' => $total,
            'status' => 'pending'
        ]);

        // 🔥 REDIRECT KE PAYMENT (INI YANG FIX LOOPING)
        return redirect()->route('payment.show', $booking->id)
            ->with('success', 'Reservasi berhasil dibuat');
    }

    // 🔹 HISTORY BOOKING
    public function myBooking()
    {
        $bookings = Booking::with('tripSchedule.destination')
            ->where('email', auth()->user()->email)
            ->latest()
            ->get();

        return view('visitor.pages.my-booking', compact('bookings'));
    }

    // 🔹 HALAMAN PAYMENT (AMAN 🔥)
    public function showPayment($id)
    {
        $booking = Booking::where('id', $id)
            ->where('email', auth()->user()->email)
            ->firstOrFail();

        return view('visitor.pages.pembayaran', compact('booking'));
    }

    // konfirmasi bayar
    public function confirm($id)
    {
        $booking = Booking::where('id', $id)
            ->where('email', auth()->user()->email)
            ->firstOrFail();

        $booking->update([
            'status' => 'paid'
        ]);

        return redirect()
            ->route('booking.my')
            ->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }
}
