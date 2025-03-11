<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use RealRashid\SweetAlert\Facades\Alert;
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b

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
<<<<<<< HEAD

=======
        // dd($credentials);
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
        if (!$credentials) {
            return $this->invalid($request);
        }
        $remember = $request->input('remember') ? true : false;
        if (!auth('admin')->attempt($credentials, $remember)) return $this->invalid($request);
<<<<<<< HEAD
        // toastr()->success('login_successfull');
        notify()->success('Welcome to Laravel Notify ⚡️');

        return redirect()->route('dashboard.index');
    }

    /**
     * Filter Member Credentials
     * @param $request
     * @return array|bool
     */
=======
        flash()->success('Login Successfull');

        return redirect()->route('dashboard.index');
    }
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
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
<<<<<<< HEAD


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
=======
    private function invalid($request)
    {
        flash()->error('Invalid Credentials!');

        return back();
    }
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
    public function logout()
    {
        if (auth('admin')->check()) {
            auth('admin')->logout();
            request()->session()->invalidate();
        }
        return redirect(route('dashboard.login'));
    }
<<<<<<< HEAD
=======
    protected function redirectTo()
    {
        return route('dashboard.index');
    }
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
}
