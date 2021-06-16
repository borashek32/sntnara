<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        $user = Socialite::driver('github')->user();
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name'        =>   $user->name,
            'password'    =>   Hash::make(Str::random(24))
        ]);
        Auth::login($user, true);

        return redirect('/dashboard');
    }
}
