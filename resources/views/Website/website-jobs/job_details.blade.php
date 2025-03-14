@extends('Website.layouts.master')

@section('content')
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>{{ $job->title }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="job_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="job_details_header">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            <div class="thumb">
                                <img src="{{ asset('img/svg_icon/1.svg') }}" alt="">
                            </div>
                            <div class="jobs_conetent">
                                <a href="#"><h4>{{ $job->title }}</h4></a>
                                <div class="links_locat d-flex align-items-center">
                                    <div class="location">
                                        <p> <i class="fa fa-map-marker"></i> {{ $job->location }}</p>
                                    </div>
                                    <div class="location">
                                        <p> <i class="fa fa-clock-o"></i> {{ $job->work_type }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="descript_wrap white-bg">
                    <div class="single_wrap">
                        <h4>Job description</h4>
                        <p>{{ $job->description }}</p>
                    </div>
                    <div class="single_wrap">
                        <h4>Qualifications</h4>
                        <ul>
                            @foreach(json_decode($job->technologies ,true) as $tech)
                                <li>{{ $tech['value'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single_wrap">
                    <h4>Salary</h4>
                    <p>${{ number_format($job->min_salary) }} - ${{ number_format($job->max_salary) }}</p>
                </div>
                </div>

                <div class="apply_job_form white-bg">
                    <h4>{{ auth()->check() && auth()->user()->role === 'employer' ? 'Manage Job' : 'Apply for the job' }}</h4>
                    @if(auth()->check() && auth()->user()->role === 'employer')
                        <!-- If Employer, Show "Edit Job" Button -->
                        <div class="col-md-12">
                            <div class="submit_btn">
                                <a href="{{ route('website.job.edit', $job->id) }}" class="btn btn-warning w-100">Edit Job</a>
                            </div>
                        </div>
                    @else
                <!-- If Not Employer, Show "Apply Now" Button -->
                <form action="#" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="submit_btn">
                            <button class="boxed-btn3 w-100" type="submit">Apply Now</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>

            </div>
            
            <div class="col-lg-4">
                <div class="job_sumary">
                    <div class="summery_header">
                        <h3>Job Summary</h3>
                    </div>
                    <div class="job_content">
                        <ul>
                            <li>Salary: <span>${{ number_format($job->min_salary) }} - ${{ number_format($job->max_salary) }}</span></li>
                            <li>Location: <span>{{ $job->location }}</span></li>
                            <li>Job Type: <span>{{ $job->work_type }}</span></li>
                            <li>Deadline: <span>{{ $job->application_deadline }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
