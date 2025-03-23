<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class MyJobsController extends Controller
{
    public function index()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->paginate(10);
        // dd(auth()->user()->id);
        return view('Website.website-jobs.my-jobs', compact('jobs'));
    }



    public function close(Job $job)
    {
        $job->applicable_status = $job->applicable_status == 'closed' ? 'open' : 'closed';
        $job->save();
        flash()->success('Job status updated successfully');
        return back();
    }
}
