<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;

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

        if (!$credentials) {
            return $this->invalid($request);
        }
        $remember = $request->input('remember') ? true : false;
        if (!auth('admin')->attempt($credentials, $remember)) return $this->invalid($request);
        // toastr()->success('login_successfull');
        notify()->success('Welcome to Laravel Notify ⚡️');

        return redirect()->route('dashboard.index');
    }

    /**
     * Filter Member Credentials
     * @param $request
     * @return array|bool
     */
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


    /**
     * Return MSG Error
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    private function invalid($request)
    {
        // toastr()->error('Oops! Something went wrong!');
        notify()->error('Welcome to Laravel Notify ⚡️');

        return back();
    }

    /**
     * Logout Admin
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        if (auth('admin')->check()) {
            auth('admin')->logout();
            request()->session()->invalidate();
        }
        return redirect(route('dashboard.login'));
    }
}
