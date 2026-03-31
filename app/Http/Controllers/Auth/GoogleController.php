<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirect(Request $request)
    {
        if ($request->has('redirect')) {
            session(['url.intended' => $request->redirect]);
        }

        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request) // ✅ FIX DI SINI
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('google_id', $googleUser->getId())
            ->orWhere('email', $googleUser->getEmail())
            ->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'password' => bcrypt(uniqid()),
            ]);
        } else {
            $user->update([
                'name' => $googleUser->getName(),
                'avatar' => $googleUser->getAvatar(),
                'google_id' => $googleUser->getId(),
            ]);
        }

        Auth::login($user, true);
        $request->session()->regenerate();

        return redirect()->intended('/');
    }
}
