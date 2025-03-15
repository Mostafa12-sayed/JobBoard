@extends('Website.layouts.master')

@section('content')
            <div class="job_listing_area">
                <div class="container">
                    <div class="job_lists">
                        <div class="row">
                            @foreach ($jobs as $job)
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="{{$job->user->company_logo ? asset($job->user->company_logo) : asset('assets/website/img/defult-company.png')}}" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="{{route('website.jobs.show' , $job->id)}}"><h4>{{ $job->title }}</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p> <i class="fa fa-map-marker"></i>{{$job->location}}</p>
                                                </div>
                                                <div class="location">
                                                    <p> <i class="fa fa-clock-o"></i>{{$job->job_type}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a href="job_details.html" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Date line: {{$job->application_deadline}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>


 @endsection