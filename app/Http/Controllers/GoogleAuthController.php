<?php

namespace App\Http\Controllers;
use Socialite;
use App\Models\User;

use Illuminate\Http\Request;

class GoogleAuthController extends Controller {
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {
        $user = Socialite::driver('google')->stateless()->user();
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            $token = $existingUser->createToken('authToken')->plainTextToken;
        } else {
            $newUser = User::create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'login_status' => 'active',
            ]);
            $token = $newUser->createToken('authToken')->plainTextToken;
        }

        return response()->json(['token' => $token], 200);
    }
}