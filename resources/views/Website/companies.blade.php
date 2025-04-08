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
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">{{$jobCount}}+ Jobs listed</h5>
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



 @endsection
 @section('js')

 @endsection