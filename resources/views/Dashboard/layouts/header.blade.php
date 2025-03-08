<div class="head bg-white p-15 d-flex align-center between-flex">
  <div class="search p-relative">
    <input
      class="p-10"
      type="search"
      name=""
      id=""
      placeholder="Type A keyword"
    />
  </div>
  <div class="icons d-flex align-center">
    <span class="notification p-relative">
      <i class="fa-regular fa-bell fa-lg"></i>
    </span>
    <img src="{{asset(auth('admin')->user()->image ?? "assets/dashboard/imgs/avatar.png") }}" alt="" />
  </div>
</div>