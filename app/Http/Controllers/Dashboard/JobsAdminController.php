<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class JobsAdminController extends Controller
{


    public function index(Request $request)
    {

        if ($request->all() == []) {
            $jobs = Jobs::where('status', 'pending')->get();
        } else {
            $query = Jobs::query();

            // Filter by title
            if ($request->has('title') && !empty($request->title)) {
                $query->where('title', 'like', '%' . $request->title . '%');
            }

            // Filter by category
            if ($request->has('category') && !empty($request->category)) {
                $query->where('category_id', $request->category);
            }

            // Filter by type
            if ($request->has('type') && !empty($request->type)) {
                $query->where('type', $request->type);
            }

            // Filter by status
            if ($request->has('status') && !empty($request->status)) {
                $query->where('status', $request->status);
            }

            // Filter by salary
            if ($request->has('salary') && !empty($request->salary)) {
                $salary = $request->salary;
                if (strpos($salary, '-') !== false) {
                    list($minSalary, $maxSalary) = explode('-', $salary);
                    $query->whereBetween('min_salary', [(int) $minSalary, (int) $maxSalary]);
                } else {
                    $query->where('min_salary', '>=', (int) $salary);
                }
            }

            $jobs = $query->get();
        }

        return view('dashboard.jobs.index', ['jobs' => $jobs]);
    }



    public function show(Jobs $job)
    {
        return view('dashboard.jobs.show', ['resource' => $job]);
    }

    public function changeStatus(Request $request)
    {
        $job = Jobs::find($request->id);
        $job->status = $request->status;
        $job->save();
        flash()->success('Status updated successfully');
    }
}
