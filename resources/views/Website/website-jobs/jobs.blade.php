@extends('Website.layouts.master')


@section('content')

<style>
    .number{
        padding: 5px !important
    }
</style>
<!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                    <h3>{{ isset($jobCount) ? $jobCount : '0' }}+ Jobs Available</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="job_filter white-bg">
                        <div class="form_inner white-bg">
                            <h3>Filter</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="text" id="jobkeywordfilter" placeholder="Search keyword">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                        <input type="text" id="joblocationfilter" placeholder="location">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" id="jobworktypefilter">
                                                <option data-display="work type" value="">Work type</option>
                                                <option value="onsite">onsite</option>
                                                <option value="remote">remote </option>
                                                <option value="hybrid">hybrid </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" id="jobcategoryfilter">
                                                <option data-display="Category" value="">Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" id="jobtypefilter">
                                                <option data-display="Job type" value="">Job type</option>
                                                <option value="full-time">full time</option>
                                                <option value="part-time">part time</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="number" id="jobminfilter" placeholder="Min Salary">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="number" id="jobmaxfilter" placeholder="Max Salary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                        <div class="reset_btn">
                            <button  class="boxed-btn3 w-100" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
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
                                        <img src="{{$job->user->company_logo ? asset($job->user->company_logo) : asset('assets/website/img/defult-company.png')}}" alt="">
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
                    </div>
                    @if($jobs->lastPage() > 1)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pagination_wrap">
                                <ul>
                                    @if ($jobs->onFirstPage())
                                        <li><span><i class="ti-angle-left"></i></span></li>
                                    @else
                                        <li><a href="{{ $jobs->previousPageUrl() }}"><i class="ti-angle-left"></i></a></li>
                                    @endif
                                    @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                                        <li>
                                            @if ($page == $jobs->currentPage())
                                                <span style="background-color: rgb(16, 170, 241) ; width: 25px; height: 25px; border-radius: 50%; display: inline-block; margin-right: 5px; color: white; text-align: center; line-height: 25px;" >{{ $page }}</span> 
                                            @else
                                                <a href="{{ $url }}"><span>{{ $page }}</span></a>
                                            @endif
                                        </li>
                                    @endforeach
                    
                                    @if ($jobs->hasMorePages())
                                        <li><a href="{{ $jobs->nextPageUrl() }}"><i class="ti-angle-right"></i></a></li>
                                    @else
                                        <li><span><i class="ti-angle-right"></i></span></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div> <!-- End container -->
</div> 

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Listen for changes to filter inputs
        $('#jobkeywordfilter, #jobcategoryfilter, #joblocationfilter, #jobworktypefilter, #jobtypefilter, #jobminfilter, #jobmaxfilter').change(function() {
            performFilter();
        });

        // Add reset button handler
        $('.reset_btn button').click(function() {
            // Clear all inputs
            $('#jobkeywordfilter, #joblocationfilter, #jobminfilter, #jobmaxfilter').val('');
            $('#jobcategoryfilter, #jobworktypefilter, #jobtypefilter').val('').trigger('change');
            performFilter();
        });

        function performFilter() {
            var keyword = $('#jobkeywordfilter').val() || '';
            var category = $('#jobcategoryfilter').val() || '';
            var location = $('#joblocationfilter').val() || '';
            var worktype = $('#jobworktypefilter').val() || '';
            var type = $('#jobtypefilter').val() || '';
            var min = $('#jobminfilter').val() || '';
            var max = $('#jobmaxfilter').val() || '';

            console.log('Filter values:', {
                keyword, category, location, worktype, type, min, max
            });

            $.ajax({
                url: "{{ route('website.jobs.filter') }}",
                method: 'get',
                data: {
                    keyword: keyword,
                    category: category,
                    location: location,
                    worktype: worktype,
                    type: type,
                    min: min,
                    max: max
                },
                success: function(response) {
                    console.log('Response:', response);
                    
                    var jobs = response.jobs.data;
                    var jobcount = response.jobcount;
                    
                    // Update job count in header
                    $('.bradcam_text h3').text(jobcount + '+ Jobs Available');
                    
                    // Clear existing job listings
                    $('.job_lists .row').empty();
                    
                    if (!jobs || jobs.length === 0) {
                        $('.job_lists .row').append(`
                            <div class="col-lg-12 col-md-12">
                                <div class="alert alert-info">
                                    <h4>No Jobs Found</h4>
                                    <p>Sorry, no jobs found matching your criteria.</p>
                                </div>
                            </div>
                        `);
                    } else {
                        jobs.forEach(function(job) {
                            $('.job_lists .row').append(`
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_jobs white-bg d-flex justify-content-between">
                                        <div class="jobs_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="{{$job->user->company_logo ? asset($job->user->company_logo) : asset('assets/website/img/defult-company.png')}}" alt="">
                                            </div>
                                            <div class="jobs_conetent">
                                                <a href="/jobs/${job.id}"><h4>${job.title}</h4></a>
                                                <div class="links_locat d-flex align-items-center">
                                                    <div class="location">
                                                        <p><i class="fa fa-map-marker"></i> ${job.location}</p>
                                                    </div>
                                                    <div class="location">
                                                        <p><i class="fa fa-clock-o"></i> ${job.work_type}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jobs_right">
                                            <div class="apply_now">
                                                <a href="/jobs/${job.id}" class="boxed-btn3">Apply Now</a>
                                            </div>
                                            <div class="date">
                                                <p>Deadline: ${job.application_deadline}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Ajax Error:', {xhr, status, error});
                    $('.job_lists .row').html(`
                        <div class="col-lg-12 col-md-12">
                            <div class="alert alert-danger">
                                <h4>Error</h4>
                                <p>An error occurred while filtering jobs. Please try again.</p>
                            </div>
                        </div>
                    `);
                }
            });
        }
    });
</script>

@endsection
