<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CandidateUser;
use App\Models\Category;
use App\Models\EmployeeUser;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function show()
    {
        $categories = Category::withcount('jobs')->where('status', 'active')->get();
        $jobs = Job::with('category')->paginate(10);
        $candidates = CandidateUser::paginate(10);
        $employer = EmployeeUser::paginate(4);
        return view('Website.index', compact('categories'), compact('jobs', 'candidates', 'employer'));
    }

    public function candidates()
    {
        $candidates = User::select('name')->where('role', 'candidate')->paginate(8);
        // dd($candidates);

        return view('Website.candidates', compact('candidates'));
    }
}
