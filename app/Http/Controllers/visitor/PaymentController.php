<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        // ❌ CEK TOTAL BIAR GA ERROR MIDTRANS
        if ($booking->total_price <= 0) {
            return "Total pembayaran tidak valid!";
        }

        // ✅ SET CONFIG MIDTRANS
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // ✅ PARAMETER TRANSAKSI
        $params = [
            'transaction_details' => [
                'order_id' => 'BOOK-' . $booking->id . '-' . time(),
                'gross_amount' => (int) max(1, $booking->total_price),
            ],
            'customer_details' => [
                'first_name' => $booking->name,
                'email' => $booking->email,
                'phone' => $booking->phone,
            ],
        ];

        try {
            // 🔥 GENERATE SNAP TOKEN
            $snapToken = Snap::getSnapToken($params);
        } catch (\Exception $e) {
            return "Midtrans Error: " . $e->getMessage();
        }

        return view('visitor.pages.pembayaran', compact('booking', 'snapToken'));
    }
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                // Kita harus mengambil ID booking dari order_id Midtrans
                // Contoh order_id: BOOK-4-17112233
                $parts = explode('-', $request->order_id);
                $bookingId = $parts[1];

                $booking = Booking::find($bookingId);
                if ($booking) {
                    $booking->update(['status' => 'paid']);
                }
            }
        }

        return response()->json(['status' => 'success']);
    }
}
