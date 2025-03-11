<style>

  .active{
    background-color: rgb(194, 194, 194) !important
  }
  ul{
    padding: 0 !important;
  }
</style>

<<<<<<< HEAD
<div class="sidebar p-relative bg-white p-20">
=======
<div class="sidebar p-relative bg-white p-20 ">
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
  <h3 class="p-relative txt-c mt-0">{{auth('admin')->user()->name}}</h3>
  <ul>
    <li>
      <a
        href="{{route('dashboard.index')}}"
        class="d-flex fs-14 rad-6 p-10 align-center c-black align-center {{request()->routeIs('dashboard.index*')? 'active' : ''}} "
        id="index"
      >
        <i class="fa-regular fa-chart-bar fa-fw mr-5"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li>
      <a
        href="{{route('dashboard.category.index')}}"
        class="d-flex fs-14 rad-6 p-10 align-center c-black align-center {{request()->routeIs('dashboard.category.index*')? 'active' : ''}}"
        id="index"
      >
      <i class="fa-solid fa-list mr-5"></i>
          <span>Categories</span>
      </a>
    </li>
    <li>
      <a
        href="{{route('dashboard.user.index')}}"
        class="d-flex fs-14 rad-6 p-10 align-center c-black align-center {{request()->routeIs('dashboard.user.index*')? 'active' : ''}}"
        id="index"
      >
      <i class="fa-solid fa-users mr-5"></i>
                <span>Users</span>
      </a>
    </li>
<<<<<<< HEAD
=======

    <li>
      <a
        href="{{route('dashboard.jobs.index')}}"
        class="d-flex fs-14 rad-6 p-10 align-center c-black align-center {{request()->routeIs('dashboard.jobs.index*')? 'active' : ''}}"
        id="index"
      >
      <i class="fa-solid fa-tower-observation mr-5"></i>                
      <span>Jobs Orders</span>
      </a>
    </li>
    
    <li>
      <a
        href="{{route('dashboard.badWord.index')}}"
        class="d-flex fs-14 rad-6 p-10 align-center c-black align-center {{request()->routeIs('dashboard.badWord.index*')? 'active' : ''}}"
        id="index"
      >
      <i class="fa-solid fa-file-word mr-5"></i>      
      <span>Bad Words</span>
      </a>
    </li>
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
    {{-- <li>
      <a
        href="setting.html"
        class="d-flex fs-14 rad-6 p-10 align-center c-black align-center"
        id="settings"
      >
        <i class="fa-solid fa-gear fa-fw mr-5"></i>
        <span>Settings</span>
      </a>
    </li>
    <li>
      <a
        href="profile.html"
        class="d-flex fs-14 rad-6 p-10 align-center c-black align-center"
        id="profile"
      >
        <i class="fa-regular fa-user fa-fw mr-5"></i>
        <span>Profile</span>
      </a>
    </li>
    <li>
      <a
        href="projects.html"
        class="d-flex fs-14 rad-6 p-10 align-center c-black align-center"
        id="projects"
      >
        <i class="fa-solid fa-diagram-project fa-fw mr-5"></i>
        <span>Projects</span>
      </a>
    </li>
    <li>
      <a
        href="courses.html"
        class="d-flex fs-14 rad-6 p-10 align-center c-black align-center"
        id="courses"
      >
        <i class="fa-solid fa-graduation-cap fa-fw mr-5"></i>
        <span>Courses</span>
      </a>
    </li>
    <li>
      <a
        class="d-flex align-center fs-14 c-black rad-6 p-10"
        href="friends.html"
        id="friends"
      >
        <i class="fa-regular fa-circle-user fa-fw mr-5"></i>
        <span>Friends</span>
      </a>
    </li>
    <li>
      <a
        class="d-flex align-center fs-14 c-black rad-6 p-10"
        href="files.html"
        id="files"
      >
        <i class="fa-regular fa-file fa-fw mr-5"></i>
        <span>Files</span>
      </a>
    </li>
    <li>
      <a
        class="d-flex align-center fs-14 c-black rad-6 p-10"
        href="plans.html"
        id="plans"
      >
        <i class="fa-regular fa-credit-card fa-fw mr-5"></i>
        <span>Plans</span>
      </a>
    </li> --}}
    <li class="logout">
      <a
        class="d-flex align-center fs-14 c-black rad-6 p-10"
        href="{{route('dashboard.logout')}}"
      >
        <i class="fa-solid fa-right-from-bracket mr-5"></i>
        <span>Logout</span>
      </a>
    </li>
  </ul>
</div>