<?php
namespace App\Http\Controllers\Website; 

use App\Http\Controllers\Controller;
use App\Models\Job; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller {
    public function create() {
        return view('website.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'location' => 'required',
            'technologies' => 'required',
            'work_type' => 'required|in:remote,onsite,hybrid',
            'salary_range' => 'required',
            'application_deadline' => 'required|date',
        ]);

        // $employer = Auth::user()->employer;
        // if (!$employer) {
        //     return redirect()->back()->with('error', 'You need to register as an employer first.');
        // }

        // $employer->jobs()->create($request->all());

        Job::create($request->all());
        return redirect()->route('website.jobs.index')->with('success', 'Job posted successfully.');
    }
    
    public function index()
    {
        $jobs = Job::paginate(5); 
        $jobCount = Job::count();
        return view('Website.jobs', compact('jobs', 'jobCount'));
    }
    
    public function show($id)
    {
        $job = Job::findOrFail($id); 
        return view('website.job_details', compact('job'));
    }

    public function manage()
    {
        $jobs = Auth::user()->employer->jobs; 
        return view('jobs.manage', compact('jobs'));
    }

    public function edit($id) {
        $job = Job::findOrFail($id);
        return view('website.edit', compact('job'));
    }
    
    
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'location' => 'required',
            'technologies' => 'required',
            'work_type' => 'required|in:remote,onsite,hybrid',
            'salary_range' => 'required',
            'application_deadline' => 'required|date',
        ]);
    
        $job = Job::findOrFail($id);
        $job->update($request->all());
    
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }
    
    
    
    public function destroy(Job $job) 
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
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
}
