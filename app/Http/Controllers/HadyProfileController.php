<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HadyProfileController extends Controller
{
    public function index()
    {
        return view('hady-profile');
    }
}
