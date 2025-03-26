<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendPasswordResetEmail;
use App\Mail\PasswordMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Illuminate\Support\Str;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $token = Str::random(65);
        if (DB::table('password_reset_tokens')->where('email', $request->email)->first()) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        }
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' =>  $token,
            'created_at' => now()
        ]);
        SendPasswordResetEmail::dispatch($request->email, $token);
        // Mail::to($request->email)->send(new PasswordMail($token));
        flash()->success('Password reset link sent to your email address.');
        return to_route('login');
    }

    public function showLinkRequestForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $token = DB::table('password_reset_tokens')->where(['email' => $request->email, 'token' => $request->token])->first();
        if (!$token) {
            flash()->error('Invalid Email or Token.');
            return back();
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            flash()->error('Invalid Email or Token.');
            return back();
        }
        $user->password = Hash::make($request->password);
        $user->save();
        DB::table('password_reset_tokens')->where(['email' => $request->email, 'token' => $request->token])->delete();
        flash()->success('Password reset successfully.');
        return redirect('/login');
    }
}
