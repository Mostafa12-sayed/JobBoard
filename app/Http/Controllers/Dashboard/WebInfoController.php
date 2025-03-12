<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\WebInfo;
use Illuminate\Http\Request;

class WebInfoController extends Controller
{
    public function index()
    {
        return view('dashboard.webInfo.index', ['websiteInfo' => WebInfo::first() ?? new WebInfo()]);
    }
    public function edit()
    {
        // update web info
        return view('dashboard.webInfo.form', ['resource' => WebInfo::first() ?? new WebInfo()]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|numeric|digits_between:10,20',
            'address' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->all();
        $webInfo = WebInfo::first();

        if ($request->hasFile('logo')) {
            $data['logo'] = uploadFile($request->file('logo'), 'webinfo/', $webInfo->logo ?? null);
        }
        if ($request->hasFile('favicon')) {
            $data['favicon'] = uploadFile($request->file('favicon'), 'webinfo/', $webInfo->logo ?? null);
        }

        if ($webInfo) {
            $webInfo->update($data);
        } else {

            WebInfo::Create($data);
        }

        flash()->success('Updated successfully');

        return back();
        // update web info
    }
}
