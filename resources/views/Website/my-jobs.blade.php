@extends('Website.layouts.master')

@section('content')

@component('Website.layouts.includes.bradcamp')

    @slot('title')
    My Jobs
    @endslot
    
@endcomponent
    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Job Listing</h4>
                                </div>
                                <div class="col-md-6">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="job_lists m-0">
                    <div class="row">
                        @if($jobs->count() == 0)
                        <div class="col-lg-12 col-md-12">
                            @component('Website.layouts.includes.alter')
                                @slot('title')
                                    No Jobs Found
                                @endslot
                                @slot('content')
                                    Sorry, no jobs found.
                                @endslot
                            @endcomponent
                        </div>
                        @else
                        @foreach($jobs as $job)
                        <div class="col-lg-12 col-md-12">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{ asset('img/svg_icon/1.svg') }}" alt="">
                                    </div>
                                    <div class="jobs_conetent">
                                        <a href="{{ route('website.jobs.show', $job->id) }}"><h4>{{ $job->title }}</h4></a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p><i class="fa fa-map-marker"></i> {{ $job->location }}</p>
                                            </div>
                                            <div class="location">
                                                <p><i class="fa fa-clock-o"></i> {{ $job->work_type }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        <a href="{{ route('website.jobs.show', $job->id) }}" class="boxed-btn3">Apply Now</a>
                                    </div>
                                    <div class="date">
                                        <p>Deadline: {{ $job->application_deadline }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- <div class="col-lg-12 col-md-12">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{ asset('img/svg_icon/1.svg') }}" alt="">
                                    </div>
                                    <div class="jobs_conetent">
                                        <a href="{{ route('website.jobs.show',1) }}"><h4> dhdrhdrh </h4></a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p><i class="fa fa-map-marker"></i>rsdhrhdrh</p>
                                            </div>
                                            <div class="location">
                                                <p><i class="fa fa-clock-o"></i> segegssegse</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        <a href="{{ route('website.jobs.show', 1) }}" class="boxed-btn3">Closed</a>
                                    </div>
                                    <div class="date">
                                        <p>Deadline:</p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pagination_wrap">
                                {{ $jobs->links() }} <!-- Pagination -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End container -->
</div> 


@endsection
