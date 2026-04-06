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
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // ✅ PARAMETER TRANSAKSI
        $params = [
            'transaction_details' => [
                // Ambil langsung dari kolom payment_type
                'order_id' => 'BOOK-' . $booking->id . '-' . $booking->payment_type . '-' . time(),
                'gross_amount' => (int) $booking->total_price,
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
        $serverKey = config('services.midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            $parts = explode('-', $request->order_id);

            // Pastikan explode menghasilkan array yang cukup
            if (count($parts) < 3) return response()->json(['message' => 'Invalid ID'], 400);

            $bookingId = $parts[1];
            $type = $parts[2]; // 'dp' atau 'full'

            $booking = Booking::find($bookingId);

            if (!$booking) return response()->json(['message' => 'Not Found'], 404);

            if (in_array($request->transaction_status, ['capture', 'settlement'])) {
                $newStatus = ($type == 'dp') ? 'dp50%' : 'paid';
                $booking->update(['status' => $newStatus]);
            } elseif (in_array($request->transaction_status, ['expire', 'cancel', 'deny'])) {
                $booking->update(['status' => 'cancelled']);
            }
        }
        return response()->json(['status' => 'success']);
    }
}
