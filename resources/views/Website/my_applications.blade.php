@extends('Website.layouts.master')

@section('title', 'My Applications')

@section('content')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>My Applications  ({{ $jobs->count() }} of  {{\App\Models\WebInfo::first()->number_of_jobs_apply}})</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area end -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area">
        <div class="container">
            <div class="row">
                <!-- Sidebar if needed -->
                <div class="col-lg-12">
                    <div class="job_lists">
                        <div class="row">
                            @if($jobs->count() > 0)
                                @foreach ($jobs as $job)
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_jobs white-bg d-flex justify-content-between">
                                        <div class="jobs_left d-flex align-items-center">
                                            <div class="">
                                                <img style="width: 100px;" src="{{$job->user->company_logo ? asset($job->user->company_logo) : asset('assets/website/img/defult-company.png')}}" alt="">
                                            </div>
                                            <div class="jobs_conetent">
                                                <a href="{{route('website.jobs.show' , $job->id)}}"><h4>{{ $job->title }}</h4></a>
                                                <div class="links_locat d-flex align-items-center">
                                                    <div class="location">
                                                        <p> <i class="fa fa-map-marker"></i> {{$job->location}}</p>
                                                    </div>
                                                    <div class="location">
                                                        <p> <i class="fa fa-clock-o"></i> {{$job->job_type}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jobs_right">
                                            
                                            <div class="apply_now text-right">
                                               @if($job->applications->where('user_id', auth()->user()->id)->select('status')->first()['status'] == 'pending')
                                               <span class="btn badge badge-warning">Pending</span>
                                               @elseif($job->applications->where('user_id', auth()->user()->id)->select('status')->first()['status'] == 'approved')
                                               <span class="btn badge badge-success">Approved</span>
                                               @else
                                               <span class="btn badge badge-danger">Rejected</span>
                                               @endif
                                            </div>
                                          
                                            
                                            <div class="date">
                                                <p>Deadline: {{$job->application_deadline}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="col-lg-12">
                                    <div class="alert alert-info p-5">
                                        <p>You haven't applied to any jobs yet.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->
@endsection

@section('styles')
    <style>
       
    </style>
@endsection