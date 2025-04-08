@extends('Website.layouts.master')

@section('content')
<style>
    .single_company{
        width: 250px !important;
    }
    .single_company .thumb ,.thumb{
        width: 100px !important;
        padding: 0 !important;
    }
    .single_company .thumb img ,.thumb img{
        width: 100% !important;
    }
</style>
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">{{$jobcount}}+ Jobs listed</h5>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Find your Dream Job</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We provide online instant cash loans with quick approval that suit your term length</p>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                <a href="{{ route('website.jobs.index') }}" class="boxed-btn3">Find your job</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="img/banner/illustration.png" alt="">
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- search_area -->
    <div class="catagory_area">
        <div class="container mt-2">
            <form action="{{route ('home.filter')}}" method="post">
                @csrf
            <div class="row cat_search">
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <input type="text" name="keyword" placeholder="Search keyword" value="{{ request('keyword') }}">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <select class="wide"  name="location" id="location" style="height: 100px;">
                            <option value="">Location</option>
                            @foreach ($jobs_location as $job)
                            <option value="{{$job->location}}" {{ request('location') == $job->location ? 'selected' : '' }}>{{ $job->location }}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <select class="wide" name="category">
                            <option data-display="Category" value="">Category</option>
                            @foreach ($all_categories as $category)
                            <option value="{{$category->id}}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 row">
                    <div class="job_btn " >
                        <input type="submit" value="Find Job" class="boxed-btn3">
                    </div>
                    <div >
                        <a href="{{route ('home.show')}}"  class="boxed-btn3 ml-3">Reset</a>
                    </div>
                </div>
            </form>
            </div>
       
        </div>
    </div>
    <!--/ search_area -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area" style="margin-top: 20px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title mt-2">
                        <h3>Job Listing</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job text-right mt-3" id="results">
                        <a href="{{ route('website.jobs.index') }}" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
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
                                    <a href="{{route('website.jobs.show' , $job->id)}}" class="boxed-btn3">Apply Now</a>
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
    <!-- featured_candidates_area_end  -->


    <!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
        <div class="row align-items-center">
                <div class="col-lg-6 mb-40">
                    <div class="section_title">
                        <h3>popular categories</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="{{route('website.jobs.index', ['category' => $category->id])}}"><h4>{{$category->name}}</h4></a>
                        <p> <span>{{$category->jobs_count}}</span> Available position</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- popular_catagory_area_end  -->


    <div class="top_companies_area">
        <div class="container">
            <div class="row align-items-center mb-40">
                <div class="col-lg-6 col-md-6">
                    <div class="section_title">
                        <h3>Top Companies</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="brouse_job text-right">
                        <a href="{{ route('companies.index') }}" class="boxed-btn4">Browse More Companies</a>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <div class="row">
                    @foreach ($employer as $employer) 
                    <div class="col-lg-4 col-xl-3 col-md-6" style="height: auto;">
                        <div class="single_company " style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div class="thumb" style="width: 80px; height: 110px; margin-right:0px;">
                                <img src="{{ asset('storage/' . $employer->company_logo) }}" style="width: 80px; height: 110px;" alt="">
                            </div>
                            <div style="height: 30px;" class="mt-2">
                                <a href="{{ route('website.jobs.index') }}"> <span>{{$employer->company_name}}</span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> 
    </div>


<!-- testimonial_area -->
<div class="testimonial_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-40">
                    <h3>Testimonials</h3>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <!-- Testimonial 1 -->
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-xl-11">
                                <div class="single_testmonial d-flex align-items-center">
                                    <div class="thumb">
                                        <div class="quote_icon">
                                            <i class="flaticon-quote"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p>"This company provided exceptional service. Their team went above and beyond to meet our needs and delivered outstanding results."</p>
                                        <span>- Michael Johnson</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-xl-11">
                                <div class="single_testmonial d-flex align-items-center">
                                    <div class="thumb">
                                        <div class="quote_icon">
                                            <i class="flaticon-quote"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p>"The quality of their work is unmatched. We've been working together for years and they consistently exceed our expectations."</p>
                                        <span>- Sarah Williams</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-xl-11">
                                <div class="single_testmonial d-flex align-items-center">
                                    <div class="thumb">
                                        <div class="quote_icon">
                                            <i class="flaticon-quote"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p>"Their innovative solutions helped us solve complex problems and significantly improved our business operations."</p>
                                        <span>- David Thompson</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /testimonial_area -->


 @endsection
 @section('js')


 @endsection