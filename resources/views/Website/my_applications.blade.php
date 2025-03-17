@extends('Website.layouts.master')

@section('title', 'My Applications')

@section('content')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>My Applications</h3>
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
                                            <div class="apply_now">
                                                <a href="{{route('website.jobs.show' , $job->id)}}" class="boxed-btn3">View Details</a>
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
                                    <div class="alert alert-info">
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
        .thumb img {
            width: 100px;
            height: auto;
            object-fit: contain;
        }
        .bradcam_area {
            background-image: url('/assets/website/img/banner/bradcam.png');
            padding: 170px 0;
            background-size: cover;
            background-position: center center;
            position: relative;
            z-index: 0;
            background-image: url('/assets/website/img/banner/bradcam.png');
        }
        .bradcam_text h3 {
            font-size: 50px;
            font-weight: 700;
            color: #fff;
            text-transform: capitalize;
        }
    </style>
@endsection