<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CandidateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        if ($provider) {

            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }
    public function Callback($provider)
    {

        try {
            $userSocial  =   Socialite::driver($provider)->stateless()->user();
            $user = User::firstOrCreate(
                ['email' => $userSocial->getEmail()],
                [
                    'name' => $userSocial->getName(),
                    'provider' => $provider,
                    'provider_id' => $userSocial->getId(),
                    'profile_picture'         => $userSocial->getAvatar(),
                ]
            );
            CandidateUser::firstOrCreate(['user_id' => $user->id]);
            // dd($user);
            Auth::guard('web')->login($user);
            return redirect('/');
        } catch (\Exception $e) {
            flash('Failed to login with  ' . $provider, 'error');
            return to_route('login');
        }
    }
}
