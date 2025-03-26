<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\CandidateUser;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use App\Models\WebInfo;
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


    public function index(Request $request)
    {
        // dd($request);
        $categoryId = $request->query('category');;
        if ($categoryId) {
            $jobs = Job::where('category_id', $categoryId)->paginate(5);
        } else {
            $jobs = Job::paginate(5);
        }

        $jobCount = Job::count();
        $categories = Category::select('name', 'id')->get();

        return view('Website.website-jobs.jobs', compact('jobs', 'jobCount', 'categories'));
    }

    public function show($id)
    {
        $user_id = Auth::id();
        $job = Job::findOrFail($id);
        $application = Applications::where('user_id', $user_id)->where('job_id', $id)->first();

        return view('Website.website-jobs.job_details', compact('job', 'application'));
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



    public function filter(Request $request)
    {

        $keyword = $request->input('keyword');
        $location = $request->input('location');
        $category = $request->input('category');
        $type = $request->input('type');
        $worktype = $request->input('worktype');
        $min = $request->input('min');
        $max = $request->input('max');
        $jobcount = Job::count();
        $q = Job::query();
        $q->where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('description', 'LIKE', '%' . $keyword . '%');
        });
        if ($location) {
            $q->where('location', 'LIKE', '%' . $location . '%');
        }
        if ($category) {
            $q->where('category_id', $category);
        }
        if ($type) {
            $q->where('job_type', $type);
        }
        if ($worktype) {
            $q->where('work_type', $worktype);
        }
        if ($min && is_numeric($min)) {
            $q->where('min_salary', '>=', (float)$min);
        }
        if ($max && is_numeric($max)) {
            $q->where('max_salary', '<=', (float)$max);
        }
        $jobs = $q->where('applicable_status', 'open')->paginate(10);

        return response()->json(['jobs' => $jobs, 'jobcount' => $jobcount]);
    }
    public function delete_app($id)
    {
        $application = Applications::where('id', $id)->first();
        if ($application) {
            $application->delete();
            return redirect()->back()->with('success', 'Application canceled successfully');
        }
        return redirect()->back()->with('success', 'Application canceled successfully');
    }


    public function apply($id)
    {

        $user_id = Auth::id();

        if ($this->checkAvaliableApply()) {
            return back()->with('error', 'You have already applied Limited.');
        }

        $user = User::where('id', $user_id)->first();
        $candidate = CandidateUser::where('user_id', $user_id)->first();
        if (!$candidate->resume) {
            return back()->with('info', 'Please upload resume to apply jobs');
        }
        $application = new Applications;
        $application->job_id = intval($id);
        $application->user_id = $user_id;
        $application->resume_path = $candidate->resume;
        $application->name = $user->name;
        $application->email = $user->email;
        $application->phone = $user->phone_number;
        $application->save();

        return redirect()->back()->with('success', 'Application sent successfully');
    }

    public function showApplications($jobId)
    {
        $job = Job::with('applications')->findOrFail($jobId);

        if (Auth::id() !== $job->user_id || Auth::user()->role !== 'employer') {
            return redirect()->back()->with('error', 'You are not authorized to view applications for this job.');
        }

        return view('Website.website-jobs.applications', compact('job'));
    }

    public function acceptApplication($jobId, $applicationId)
    {
        $application = Applications::where('job_id', $jobId)->where('id', $applicationId)->firstOrFail();
        // dd($application->job->user_id);

        if (Auth::id() !== $application->job->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to accept this application.');
        }

        $application->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Application accepted.');
    }

    public function rejectApplication($jobId, $applicationId)
    {
        $application = Applications::where('job_id', $jobId)->where('id', $applicationId)->firstOrFail();

        if (Auth::id() !== $application->job->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to reject this application.');
        }

        $application->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Application rejected.');
    }


    public function checkAvaliableApply()
    {
        $avaliable_jobs = WebInfo::select('number_of_jobs_apply')->first();
        $number_of_jobs = Auth::user()->application->count();

        if ($number_of_jobs >= $avaliable_jobs->number_of_jobs_apply) {
            return true;
        }

        return false;
    }
}
