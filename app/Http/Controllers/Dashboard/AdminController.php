<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view()
    {
        return view('dashboard.login');
    }



    public function login(AdminRequest $request)
    {
        $credentials = $this->credentials($request);
        if (!$credentials) {
            return $this->invalid($request);
        }
        $remember = $request->input('remember') ? true : false;
        if (!auth('accounting')->attempt($credentials, $remember)) return $this->invalid($request);
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('accounting.model');
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
        toastr()->error('', 'email_or_password_error');
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
}
