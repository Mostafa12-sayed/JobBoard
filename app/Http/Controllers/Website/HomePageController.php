<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $categories=Category::all();
        // $number_of_jobs=
        return view('Website.index',compact('categories'));
    }
}
