<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function view()
    {
        // dd("doe");
        return view('Dashboard.login');
    }


    public function login(AdminRequest $request)
    {
        $credentials = $this->credentials($request);
        // dd($credentials);
        if (!$credentials) {
            return $this->invalid($request);
        }
        $remember = $request->input('remember') ? true : false;
        if (!auth('admin')->attempt($credentials, $remember)) return $this->invalid($request);
        flash()->success('Login Successfull');

        return redirect()->route('dashboard.index');
    }
    private function credentials($request)
    {
        $inputs = $request->validated();

        if (!filter_var($inputs['username'], FILTER_VALIDATE_EMAIL)) {
            return ['username' => $inputs['username'], 'password' => $inputs['password']];
        } elseif (filter_var($inputs['username'], FILTER_VALIDATE_EMAIL)) {
            return ['email' => $inputs['username'], 'password' => $inputs['password']];
        }
        return false;
    }
    private function invalid($request)
    {
        flash()->error('Invalid Credentials!');

        return back();
    }
    public function logout()
    {
        if (auth('admin')->check()) {
            auth('admin')->logout();
            request()->session()->invalidate();
        }
        return redirect(route('dashboard.login'));
    }
    protected function redirectTo()
    {
        return route('dashboard.index');
    }
}
