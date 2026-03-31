<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// CONTROLLERS
use App\Http\Controllers\visitor\HeroController;
use App\Http\Controllers\visitor\DestinationController;
use App\Http\Controllers\visitor\GalleryController;
use App\Http\Controllers\visitor\TentangKamiController;
use App\Http\Controllers\visitor\TripController;
use App\Http\Controllers\visitor\BookingController;
use App\Http\Controllers\Auth\GoogleController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/trip-destinations', [TripController::class, 'destinations'])
    ->name('trip.destinations');

Route::get('/', [HeroController::class, 'index'])->name('home');

Route::get('/daftar-trip', [DestinationController::class, 'index'])
    ->name('destinations.index');

Route::get('/trip/{id}', [TripController::class, 'detail'])
    ->name('trip.detail');

Route::get('/gallery', [GalleryController::class, 'index'])
    ->name('gallery.index');

Route::get('/tentang-kami', [TentangKamiController::class, 'index'])
    ->name('tentang_kami.index');


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

    // 🔹 PAYMENT
    Route::get('/payment/{id}', [BookingController::class, 'showPayment'])
        ->name('payment.show');

    // konfirmasi bayar
    Route::post('/booking/confirm/{id}', [BookingController::class, 'confirm'])
        ->name('booking.confirm')
        ->middleware('auth');

    // 🔹 HISTORY BOOKING
    Route::get('/my-booking', [BookingController::class, 'myBooking'])
        ->name('booking.my');

    // 🔹 LOGOUT (WAJIB POST)
    Route::post('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    })->name('logout');
});
