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
        // ✅ VALIDASI
        $request->validate([
            'schedule_id' => 'required|exists:trip_schedules,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'qty' => 'required|integer|min:1'
        ]);

        $schedule = TripSchedule::with(['destination', 'bookings'])
            ->findOrFail($request->schedule_id);

        // ✅ CEK QUOTA
        $booked = $schedule->bookings->sum('qty');
        $sisaQuota = $schedule->quota - $booked;

        if ($request->qty > $sisaQuota) {
            return back()->with('error', 'Quota tidak mencukupi!');
        }

        // ✅ HITUNG TOTAL
        $total = $schedule->destination->price * $request->qty;

        // ✅ SIMPAN
        $booking = Booking::create([
            'trip_schedule_id' => $schedule->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'qty' => $request->qty,
            'total_price' => $total,
            'status' => 'pending'
        ]);

        // ✅ REDIRECT KE PAYMENT
        return redirect()
            ->route('payment.show', $booking->id)
            ->with('success', 'Reservasi berhasil! Silakan lakukan pembayaran.');
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
