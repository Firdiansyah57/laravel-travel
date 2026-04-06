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

        $booked = $trip->bookings()
            ->whereIn('status', ['paid', 'dp50%'])
            ->sum('qty');
        $sisaQuota = $trip->quota - $booked;

        return view('visitor.pages.reservasi', compact('trip', 'sisaQuota'));
    }

    // 🔹 SIMPAN BOOKING
    public function store(Request $request)
    {
        $request->validate([
            'schedule_id'  => 'required|exists:trip_schedules,id',
            'name'         => 'required|string|max:255',
            'email'        => 'required|email',
            'phone'        => 'required',
            'qty'          => 'required|integer|min:1',
            'payment_type' => 'required|in:full,dp', // Tambahkan validasi ini
        ]);

        $trip = TripSchedule::with('destination')->findOrFail($request->schedule_id);

        // 🔥 CEK KUOTA REALTIME (Opsional tapi disarankan)
        $booked = $trip->bookings()->whereIn('status', ['paid', 'dp50%'])->sum('qty');
        $sisa = $trip->destination->quota - $booked;

        if ($request->qty > $sisa) {
            return back()->with('error', 'Maaf, sisa kuota hanya ' . $sisa . ' orang.');
        }

        $hargaAsli = $trip->destination->price * $request->qty;

        // Hitung nominal bayar berdasarkan pilihan
        $amountToPay = ($request->payment_type == 'dp') ? ($hargaAsli * 0.5) : $hargaAsli;

        $booking = Booking::create([
            'user_id'          => auth()->id(),
            'trip_schedule_id' => $trip->id,
            'name'             => $request->name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'qty'              => $request->qty,
            'total_price'      => $amountToPay,
            'payment_type'     => $request->payment_type,
            'status'           => 'draft' // Masuk ke keranjang dulu
        ]);

        return redirect()->route('booking.my')->with('success', 'Berhasil masuk keranjang!');
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


    public function edit($id)
    {
        $booking = Booking::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $trip = TripSchedule::with('destination')->findOrFail($booking->trip_schedule_id);

        // Pastikan nama filenya cocok: visitor.pages.reservasi_edit
        return view('visitor.pages.reservasi_edit', compact('booking', 'trip'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
            'name' => 'required',
            'phone' => 'required'
        ]);

        $booking = Booking::findOrFail($id);
        $unitPrice = $booking->tripSchedule->destination->price;

        // Hitung ulang total berdasarkan Qty baru
        $totalAsli = $unitPrice * $request->qty;

        // JAGA RUMUS DP: Jika tipe awal adalah DP, maka harga yang disimpan tetap 50%
        $newTotalPrice = ($booking->payment_type == 'dp') ? ($totalAsli * 0.5) : $totalAsli;

        $booking->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'qty' => $request->qty,
            'total_price' => $newTotalPrice,
        ]);

        return redirect()->route('booking.my')->with('success', 'Data reservasi berhasil diperbarui!');
    }

    // Hapus dari Keranjang
    public function destroy($id)
    {
        $booking = Booking::where('id', $id)->where('user_id', auth()->id())->first();

        if ($booking) {
            $booking->delete();
            return redirect()->back()->with('success', 'Berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'Gagal menghapus.');
    }
}
