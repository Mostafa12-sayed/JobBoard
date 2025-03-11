<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b

class DashboardController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        return view('dashboard.index');
    }
=======

        return view('dashboard.index');
    }


    public function profile()
    {
        $resource = Auth::guard('admin')->user();
        return view('dashboard.profile', compact('resource'));
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . Auth::guard('admin')->user()->id,
            'username' => 'required|string|max:255|unique:admins,username,' . Auth::guard('admin')->user()->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|min:8',
        ]);
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = Auth::guard('admin')->user()->password;
        }
        if ($request->hasFile('image')) {
            $path = $this->uploadFile($request->file('image'), 'images/admins/', Auth::guard('admin')->user()->image);
            $data['image'] = $path;
        }
        // dd($data);
        $user = Auth::guard('admin')->user();
        $user->update($data);

        flash()->success('Updated successfully');

        return back();
    }

    function uploadFile($file, $path, $old_file = null)
    {
        $realName = $file->getClientOriginalName();
        $filename = $file->hashName();
        $file->move($path, $filename);
        $fullpath = $path . $filename;

        if ($old_file) {
            if (file_exists($old_file)) {
                unlink($old_file);
            }
        }
        return $fullpath;
    }
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
}
