<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Validator;
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
            'avatar'      =>   $user->avatar,
            'provider_id' =>   $user->id,
            'email'       =>   $user->email,
            'password'    =>   Hash::make(Str::random(24))
        ]);
        Auth::login($user, true);

        return redirect('/dashboard');
    }

    public function vkontakte()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function vkontakteRedirect()
    {
        try {
            $user = Socialite::driver('vkontakte')->user();
            $isUser = User::where('email', $user->email)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/dashboard');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'provider_id' => $user->id,
                    'avatar' => $user->avatar,
                    'password' => Hash::make(Str::random(24))
                ]);

                Auth::login($createUser);
                return redirect('/dashboard');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('email', $user->email)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/dashboard');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'provider_id' => $user->id,
                    'avatar' => $user->avatar,
                    'password' => Hash::make(Str::random(24))
                ]);

                Auth::login($createUser);
                return redirect('/dashboard');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }


    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('email', $user->email)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/dashboard');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'provider_id' => $user->id,
                    'avatar' => $user->avatar,
                    'password' => Hash::make(Str::random(24))
                ]);

                Auth::login($createUser);
                return redirect('/dashboard');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
