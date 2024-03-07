<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthCallbackAction
{
    public function __invoke()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::query()->where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $username = Str::of($googleUser->user['given_name'])
                ->append('-', Str::random(4))
                ->lower();

            $user = new User([
                'email' => $googleUser->getEmail(),
                'username' => $username,
                'name' => $googleUser->getName(),
                'password' => Str::random(),
            ]);

            $user->save();
        }

        auth()->login($user);

        return redirect()->route('home');
    }
}
