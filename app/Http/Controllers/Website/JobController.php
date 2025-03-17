<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class JobController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $job = new Job();
        return view('Website.website-jobs.create', compact('categories', 'job'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:category,id',
            'location' => 'required',
            'technologies' => 'required',
            'work_type' => 'required|in:remote,onsite,hybrid',
            'min_salary' => 'required|numeric',
            'max_salary' => 'nullable|numeric',
            'application_deadline' => 'required|date',
        ]);

        $employer = Auth::user();
        if (!$employer || $employer->role !== 'employer') {
            return redirect()->back()->with('error', 'Only employers can post jobs.');
        }

        $job = $employer->jobs()->create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'technologies' => $request->technologies,
            'work_type' => $request->work_type,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'application_deadline' => $request->application_deadline,
            'job_type' => $request->job_type,
        ]);


        return redirect()->route('website.jobs.index')->with('success', 'Job posted successfully.');
    }


    public function index()
    {
        $jobs = Job::paginate(5);
        $jobCount = Job::count();
        $categories= Category::select('name','id')->get();

        return view('Website.website-jobs.jobs', compact('jobs', 'jobCount','categories'));
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('Website.website-jobs.job_details', compact('job'));
    }

    public function manage()
    {
        $jobs = Auth::user()->employer->jobs;
        return view('jobs.manage', compact('jobs'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $categories = Category::all();
        return view('Website.website-jobs.create', compact('job', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:category,id',
            'location' => 'required|string|max:255',
            'technologies' => 'required|string',
            'work_type' => 'required|in:remote,onsite,hybrid',
            'min_salary' => 'required|numeric|min:0',
            'max_salary' => 'nullable|numeric|gte:min_salary',
            'application_deadline' => 'required|date|after_or_equal:today',
        ]);

        $job = Job::findOrFail($id);

        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'location' => $request->location,
            'technologies' => $request->technologies,
            'work_type' => $request->work_type,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'application_deadline' => $request->application_deadline,
        ]);

        $job->update($request->all());

        return back()->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return back()->with('success', 'Job deleted successfully.');
    }

    public function acceptApplication(Job $job, $applicationId)
    {
        // Accept application logic here
        return redirect()->back()->with('success', 'Application accepted.');
    }

    public function rejectApplication(Job $job, $applicationId)
    {
        // Reject application logic here
        return redirect()->back()->with('error', 'Application rejected.');
    }

    
    public function filter(Request $request){
        
        $keyword=$request->input('keyword');
        $location=$request->input('location');
        $category=$request->input('category');
        $type=$request->input('type');
        $worktype=$request->input('worktype');
        $min=$request->input('min');
        $max=$request->input('max');

        $jobcount = Job::count();

        $q = Job::query();
        $q->where(function($query) use ($keyword) {
            $query->where('title', 'LIKE', '%'.$keyword.'%')
                  ->orWhere('description', 'LIKE', '%'.$keyword.'%');
        });
        if($location){
            $q->where('location','LIKE','%'.$location.'%');
        }
        if($category){
            $q->where('category_id',$category);
        }
        if($type){
            $q->where('job_type',$type);
        }
        if($worktype){
            $q->where('work_type',$worktype);
        }
        if($min && is_numeric($min) ){
            $q->where('min_salary', '>=', (float)$min);
        }
        if($max && is_numeric($max) ){
            $q->where('max_salary', '<=', (float)$max);
        }
        $jobs = $q->paginate(10);

        return response()->json(['jobs'=>$jobs,'jobcount'=>$jobcount]);

    }
}
