@php
    $info =webinfo();
@endphp
<style>
    /* .logo{
        width: 100px;
    }*/
    .item-nav{
        font-weight: 600 !important;
        transition: all 0.3s ease-in-out;
    }
    .item-nav:hover{
        color: rgb(0, 211, 99) !important;
    }
</style>
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="{{route('home.show')}}">
                                        <img src="{{$info ?  asset($info->logo) : ''}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('home.show') }}">home</a></li>
                                            <li><a href="{{route('website.jobs.index')}}">Browse Job</a></li>
                                            @if(Auth::check())
                                                @if(Auth::user()->role == 'employer')
                                                    <li><a href="{{ route('website.candidates') }}">Candidates</a></li>
                                                    <li><a href="{{ route('website.MyJobs.index') }}">My Jobs</a></li>
                                                @else
                                                    <li><a href="{{ route('home.show') }}">My Application Jobs</a></li>
                                                @endif
                                            @endif
                                            <li><a href="{{route('website.contact-us')}}">Contact</a></li>
                                        </ul>

                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="#">Log in</a>
                                        <a href="#">Register</a>
                                    </div>
                                    <div class="d-none d-lg-block">
                                    <a class="boxed-btn3" href="{{ route('website.job.create') }}">Post a Job</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
