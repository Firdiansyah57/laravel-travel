<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// CONTROLLERS VISITOR
use App\Http\Controllers\visitor\HeroController;
use App\Http\Controllers\visitor\DestinationController;
use App\Http\Controllers\visitor\GalleryController;
use App\Http\Controllers\visitor\TentangKamiController;
use App\Http\Controllers\visitor\TripController;
use App\Http\Controllers\visitor\BookingController;

// REDIRECT AKUN GOOGLE
use App\Http\Controllers\Auth\GoogleController;

// PAYMENT GATEWAY MIDTRANS
use App\Http\Controllers\visitor\PaymentController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HeroController::class, 'index'])->name('home');

Route::get('/trip-destinations', [TripController::class, 'destinations'])
    ->name('trip.destinations');

Route::get('/daftar-trip', [DestinationController::class, 'index'])
    ->name('destinations.index');

Route::get('/trip/{id}', [TripController::class, 'detail'])
    ->name('trip.detail');

Route::get('/gallery', [GalleryController::class, 'index'])
    ->name('gallery.index');

Route::get('/tentang-kami', [TentangKamiController::class, 'index'])
    ->name('tentang_kami.index');

// MIDTRANS
Route::post('/midtrans/callback', [PaymentController::class, 'callback']);


/*
|--------------------------------------------------------------------------
| 🔥 REALTIME QUOTA (NEW)
|--------------------------------------------------------------------------
*/
Route::get('/check-quota/{id}', [TripController::class, 'checkQuota'])
    ->name('trip.checkQuota');


/*
|--------------------------------------------------------------------------
| AUTH (GOOGLE LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', [GoogleController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleController::class, 'callback']);


/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // 🔹 RESERVASI
    Route::get('/reservasi/{id}', [BookingController::class, 'create'])
        ->name('reservasi.create');

    Route::post('/reservasi', [BookingController::class, 'store'])
        ->name('reservasi.store');

    Route::get('/reservasi/edit/{id}', [BookingController::class, 'edit'])
        ->name('reservasi.edit');

    Route::put('/reservasi/update/{id}', [BookingController::class, 'update'])
        ->name('reservasi.update');

    // 🔹 PAYMENT
    Route::get('/payment/{id}', [PaymentController::class, 'show'])
        ->name('payment.show');

    // 🔹 KONFIRMASI
    Route::post('/booking/confirm/{id}', [BookingController::class, 'confirm'])
        ->name('booking.confirm');

    // 🔹 HISTORY BOOKING
    Route::get('/my-booking', [BookingController::class, 'myBooking'])
        ->name('booking.my');

    // DELETE BOOKING
    Route::delete('/booking/delete/{id}', [BookingController::class, 'destroy'])
        ->name('booking.destroy');

    // 🔹 LOGOUT
    Route::post('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    })->name('logout');

    Route::get('/cart/count', function () {
        return response()->json([
            'count' => \App\Models\Booking::where('user_id', auth()->id())
                ->where('status', 'draft')
                ->count()
        ]);
    })->name('cart.count');

    // testing waktu payment limit
    Route::get('/cleanup-tes', function () {
        \App\Models\Booking::where('status', 'draft')
            ->where('created_at', '<', now()->subMinutes(60))
            ->delete();
        return "Data draft yang lebih dari 1 menit sudah dibersihkan!";
    });
});
