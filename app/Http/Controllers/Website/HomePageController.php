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
    public function show( Request $request)
    {
        $categories = Category::withcount('jobs')
            ->where('status', 'active')->having('jobs_count', '>', 0)->get();
        $jobs = Job::with('category')->paginate(10);
        $candidates = CandidateUser::paginate(10);
        $employer = EmployeeUser::paginate(4);

        // Get the filter inputs
                $keyword = $request->input('keyword');
                $location = $request->input('location');
                $category = $request->input('category');
        
                // Start the query
                $query = Job::query();
        
                // Apply keyword filter (search in title and description)
                if ($keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->where('title', 'like', "%{$keyword}%")
                          ->orWhere('description', 'like', "%{$keyword}%");
                    });
                }
        
                // Apply location filter
                if ($location) {
                    $query->where('location', 'like', "%{$location}%");
                }
        
                // Apply category filter
                if ($category) {
                    $query->where('category_id', $category);
                }

                // $query->where('status','approved'); for displaying approved jobs only

                // Get the filtered jobs
                $jobs = $query->with('user.employee')->paginate(10);
        
                // Get all categories for the filter dropdown
                $all_categories = Category::all();

                $jobs_location = job::all(['id', 'location']);


        return view('Website.index', compact('categories'), compact('jobs', 'candidates', 'employer','all_categories','jobs','jobs_location'));
    }
   
    public function filter( Request $request)
    {
        $categories = Category::withcount('jobs')
            ->where('status', 'active')->having('jobs_count', '>', 0)->get();
        $jobs = Job::with('category')->paginate(10);
        $candidates = CandidateUser::paginate(10);
        $employer = EmployeeUser::paginate(4);

        // Get the filter inputs
                $keyword = $request->input('keyword');
                $location = $request->input('location');
                $category = $request->input('category');
        
                // Start the query
                $query = Job::query();
        
                // Apply keyword filter (search in title and description)
                if ($keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->where('title', 'like', "%{$keyword}%")
                          ->orWhere('description', 'like', "%{$keyword}%");
                    });
                }
        
                // Apply location filter
                if ($location) {
                    $query->where('location', 'like', "%{$location}%");
                }
        
                // Apply category filter
                if ($category) {
                    $query->where('category_id', $category);
                }

                // $query->where('status','approved'); for displaying approved jobs only

                // Get the filtered jobs
                $jobs = $query->with('user.employee')->paginate(10);
        
                // Get all categories for the filter dropdown
                $all_categories = Category::all();

                $jobs_location = job::all(['id', 'location']);


        return view('Website.index', compact('categories'), compact('jobs', 'candidates', 'employer','all_categories','jobs','jobs_location'));
    }

    public function my_apps(){
        $jobs = Job::with('category')->paginate(10);

        return view('Website.my_applications',compact('jobs'));
    }

    
}
