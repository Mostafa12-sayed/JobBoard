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
    .item-nav:hover ,  .dropdown-menu a:hover{
        color: rgb(0, 211, 99) !important;
    }
    
  .dropdown-menu{
    position: absolute;
    transform: translate3d(0px, 50px, 0px);
    top: 0 !important;
    left: -140px !important;
    /* will-change: transform; */

  }
  .dropdown-menu a{
    color: black !important;
  }

  .fa-fw{
    margin-right: 10px;
  }  
    .toggle-change{
        &::after {
        border-top: 0;
        border-bottom: .3em solid;
        }
    } 


.btn-img{
    
    width: 50px !important;
    height: 50px !important;
    margin: auto !important;
    background-image: url('{{ Auth::check() && Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('assets/website/img/defult-user.jpg') }}');
    no-repeat center center;
    background-size: cover;
    border-radius: 50%;
}
.dropdown-toggle::after {
    display: none !important;
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
                                    <nav class="d-flex">
                                        <ul id="navigation">
                                            <li><a href="{{ route('home.show') }}">home</a></li>
                                            <li><a href="{{route('website.jobs.index')}}">Browse Job</a></li>
                                            @if(Auth::check())
                                                @if(Auth::user()->role == 'employer')
                                                    <li><a href="{{ route('website.candidates') }}">Candidates</a></li>
                                                    <li><a href="{{ route('website.MyJobs.index') }}">My Jobs</a></li>
                                               
                                                @endif
                                            @endif
                                            @if(Auth::check())
                                                @if(Auth::user()->role == 'candidate')
                                                    <li><a href="{{ route('home.my-apps') }}">Applications</a></li>
                                                @endif
                                            @endif
                                            <li><a href="{{route('website.contact-us')}}">Contact</a></li>
                                            <li>
                                                
                                            </li>
                                            
                                        </ul>
                                       
                                        
                                    </nav>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        @if(Auth::check())
                                        <div class="btn-group">
                                            <a href="#" class="btn-img img dropdown-toggle rounded-circle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" >
                                            </a>
                                            <div class="dropdown-menu">
                                            
                                              <a class="dropdown-item d-flex align-items-center mb-2" href="{{route('my-profile')}}">
                                                  <div class="icon d-flex align-items-center justify-content-center mr-3 ">
                                                      <span class="ion-ios-settings"></span>
                                                  </div>
                                                  Profile Settings
                                              </a>
                                              <a class="dropdown-item d-flex align-items-center mb-2" href="">
                                                  <div class="icon d-flex align-items-center justify-content-center mr-3">
                                                      <span class="ion-ios-cloud-download"></span>
                                                  </div>
                                                  My Application Jobs
                                              </a>
                                              <a class="dropdown-item d-flex align-items-center mb-2" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                  <div class="icon d-flex align-items-center justify-content-center mr-3">
                                                      <span class="ion-ios-power"></span>
                                                  </div>
                                                  Log Out
                                            </a>
                                                <form method="POST" id="logout-form" action="{{ route('logout') }}" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                          </div>
                                        @else
                                            <a href="{{route('register')}}" class="m-2 item-nav">Sign Up</a>
                                            <a href="{{route('login')}}" class="item-nav">Log in</a>
                                        @endif
                                    </div>
                                    @if(Auth::check())
                                    @if(Auth::user()->role == 'employer')
                                        <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href="{{ route('website.job.create') }}">Post a Job</a>
                                        </div>
                                    @endif
                                    @else
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href="{{ route('website.job.create') }}">Post a Job</a>
                                        </div>
                                    @endif
                                
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