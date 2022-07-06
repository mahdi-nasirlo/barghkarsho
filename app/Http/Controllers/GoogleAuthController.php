<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class GoogleAuthController extends Controller
{
    // use TwoFactorAuth;
    public function redirect()
    {
        return Socialite::driver("google")->redirect();
    }

    public function callback(Request $request)
    {


        try {
            $googleUser = Socialite::driver("google")->user();

            $user = User::where("email", $googleUser->email)->first();

            if (!$user) {
                $newUser = User::create([
                    "name" => $googleUser->name,
                    "avatar" => $googleUser->avatar,
                    "email" => $googleUser->email,
                    "password" => Hash::make(66303530),
                ]);
                $user = $newUser;
            }

            auth()->loginUsingId($user->id);

            if ($user->is_supperUser) {
                return redirect(route('filament.pages.dashboard'));
            } else redirect(route("profile"));
        } catch (\Throwable $th) {
            //TODO show throw $th;

            // Alert::error('خطایی رخ داده', 'لطفا مجددا تلاش بفرمایید');

            return redirect()->back();
        }
    }
}
