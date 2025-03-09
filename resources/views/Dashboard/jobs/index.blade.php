@extends('Dashboard.layouts.master')

@section('title' , 'JobBoard | Jobs')
@section('content')
<style>

  @media (max-width: 500px) {
    .box-footer>div{
      flex-direction: column !important;
      gap: 15px
    }

  }
  .box .friend img {
    width: 80px !important;
    height: 80px !important;
    border-radius: 50%;
    /* object-fit: cover; */
    background-color: #ccc
  }
</style>
<h1 class="p-relative">Jobs Order</h1>
<div class=" m-20 ">
@include('Dashboard.jobs.filter')
</div>
<div class="friends m-20 d-grid gap-20">

  @foreach ($jobs as $job )
  
  <div class="box bg-white rad-6 p-relative p-20 " >
    <div class="contact">
      <a class="btn-modal"  data-href="{{ route('dashboard.jobs.show' , $job->id) }}"   data-container="#dash-table-modal">

      <i class="fa-solid fa-eye"></i></a>
      {{-- <i class="fa-regular fa-envelope"></i> --}}
    </div>
    <div class="friend">
      <img src="{{asset(optional($job->user)->profile_picture ? $job->user->profile_picture :  "assets/dashboard/imgs/avatar.png")}}" alt="" class="rad-6" />
      <h4 class="mt-10 mb-10">{{optional($job->user)->name}}</h4>
      <span class="c-grey fs-13">{{$job->title}}</span>
    </div>
    <div class="icons fs-14 p-relative">

      <div class="mb-10">
        <i class="fa-solid fa-layer-group"></i>
        <span>{{$job->category->name}}</span>
      </div>
      <div class="d-flex gap-2 mb-10">        
        <i class="fa-solid fa-code-commit fa-fw"></i>

        <p>{{$job->description}}</p>
      </div>
      {{-- <span class="vip fw-bold c-orange">VIP</span> --}}
    </div>
  {{-- </a> --}}
    <div class="box-footer">
      <div class="between-flex mt-20 p-relative fs-13 ">
        <span class="c-grey mb-0">Created on {{date('d M Y', strtotime($job->created_at))}}</span>
        <div class="d-flex gap-20">
          <button class="btn-shape d-block blue bg-blue changeStatus" id="dd" data-id="{{ $job->id }}"  data-status="approved" data-href="{{route('dashboard.jobs.changeStatus')}}"
            >Accept</button
          >
          <button class="btn-shape d-block red bg-red changeStatus" data-id="{{ $job->id }}" data-status="rejected"  data-href="{{route('dashboard.jobs.changeStatus')}}">Reject</button>
        </div>
      </div>
    </div>
  </div>

  @endforeach

</div>

@endsection

@section('js')

<script>
  
  $(document).ready(function() {
    $('.changeStatus').on('click', function(e) {
      console.log('clicked');
     e.preventDefault();
     var btn = $(this);
     btn.prop('disabled', true);  // Disable the button
     var id = $(this).data('id');
     var status = $(this).data('status');
     var href = $(this).data('href');
     $.ajax({
         url: href,
         type: 'POST',
         data: {
            _token: '{{csrf_token()}}',id:id, status:status
         },
         success: function(response) {
           location.reload();
         },
         error: function(xhr) {
             var errors = xhr.responseJSON.errors;
             console.log(errors);
         }
     });
 });
});

</script>
@endsection