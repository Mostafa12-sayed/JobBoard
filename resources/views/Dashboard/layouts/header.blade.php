
<style>
  .profile-menu { 
  .dropdown-menu{
    right: 0;
    left: unset;
  }
  .fa-fw{
    margin-right: 10px;
  }  
}
.toggle-change{
    &::after {
    border-top: 0;
    border-bottom: .3em solid;
    }
} 
.badge{
  position: absolute !important;
  top:0px !important;
  left: -12px !important;
  padding: 4px;
  border-radius: 50%;
}
</style>

<nav class="navbar navbar-expand-lg navbar-white bg-white">
  <div class="container-fluid">
    <a href="{{route('dashboard.index')}}" class="navbar-brand" href="#">{{$title ?? 'JobBoard Dashboard'}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        
      </ul> --}}
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu d-flex align-items-center gap-3"> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle position-relative" href="#" id="messages" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="badge bg-danger">31</span>
            <i class="fa-solid fa-bell" style="font-size: 20px !important;"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="messages">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle position-relative" href="#" id="notifications" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="badge bg-danger">31</span>
            <i class="fa-solid fa-envelope" style="font-size: 20px !important;"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="notifications">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @if(Auth::guard('admin')->user()->image)
            <img src="{{asset(Auth::guard('admin')->user()->image)}}" alt="Admin Image" class="rounded-circle" width="30" height="30">
            @else
            <i class="fas fa-user"></i>
            @endif
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('dashboard.profile')}}"><i class="fas fa-sliders-h fa-fw"></i> Account</a></li>
            <li><a class="dropdown-item" href="{{route('dashboard.logout')}}"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a></li>
          </ul>
        </li>
     </ul>
    </div>
  </div>
</nav>