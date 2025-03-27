<?php

// namespace App\Http\Controllers\Website;

// use App\Http\Controllers\Controller;
// use App\Mail\VerifyEmail;
// use App\Models\CandidateUser;
// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail;
// use Laravel\Socialite\Facades\Socialite;
// use Stringable;
// use Illuminate\Support\Str;

// class SocialController extends Controller
// {
//     public function redirect($provider)
//     {
//         if ($provider) {

//             return Socialite::driver($provider)->redirect();
//         }
//         abort(404);
//     }
//     public function Callback($provider)
//     {

//         try {
//             $userSocial  =   Socialite::driver($provider)->stateless()->user();
//             // dd($userSocial);
//             $token = Str::random(65);

//             $user = User::firstOrCreate(
//                 ['email' => $userSocial->getEmail()],
//                 [
//                     'name' => $userSocial->getName(),
//                     'provider' => $provider,
//                     'provider_id' => $userSocial->getId(),
//                     'profile_picture' => $userSocial->getAvatar(),
//                     'role' => 'candidate',
//                     'verification_token' => $token
//                 ]
//             );
//             CandidateUser::firstOrCreate(['user_id' => $user->id], [
//                 'profile_picture' => $userSocial->getAvatar(),

//             ]);
//             // dd($user);
//             if (!$user->email_verified_at) {
//                 // dd("email not verified");
//                 Mail::to($user->email)->send(new VerifyEmail($user));
//                 dd("email sent");
//                 flash('Please verify your email address to login', 'info');
//             }
//             Auth::guard('web')->login($user);
//             return redirect('/');
//         } catch (\Exception $e) {
//             flash('Failed to login with  ' . $provider, 'error');
//             return to_route('login');
//         }
//     }
// }
namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Jobs\SendVerificationEmail;
use App\Mail\VerifyEmail;
use App\Models\CandidateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        if (!$provider) {
            abort(404);
        }

        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        try {
            $userSocial = Socialite::driver($provider)->user();
            $token = Str::random(65);

            $user = User::where('email', $userSocial->getEmail())->first();

            if (!$user) {
                // Create a new user
                $user = User::create([
                    'name' => $userSocial->getName(),
                    'email' => $userSocial->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $userSocial->getId(),
                    'profile_picture' => $userSocial->getAvatar(),
                    'role' => 'candidate',
                    'verification_token' => $token,
                ]);

                // Create candidate profile
                CandidateUser::create([
                    'user_id' => $user->id,
                    'profile_picture' => $userSocial->getAvatar(),
                ]);

                // Send email verification
                SendVerificationEmail::dispatch($user);
                Auth::guard('web')->login($user);
                flash()->info('Please verify your email address before logging in.');
                // return redirect()->route('login'); // Redirect to login page
                return redirect()->route('verification.notice');
            }
            // Check if email is verified
            if (!$user->email_verified_at) {
                SendVerificationEmail::dispatch($user);
                flash()->info('Please verify your email address before logging in.');
                return redirect()->route('verification.notice');
            }

            // Authenticate user
            Auth::login($user);
            return redirect('/');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to login with ' . $provider);
            return redirect()->route('login');
        }
    }
}
