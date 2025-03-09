@php
  $title ="Job Details";
@endphp

@section('css')
  <style>
    .model-body .row:nth-child(1) {
    width: 35% !important;
    }

  </style>
@endsection

<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content ">
    <div class="modal-header">
      <h5 class="modal-title">
        {{ $title }}
      </h5>
    </div>
    <div class="modal-body">
      <form class="form"
        action="{{ $resource->id ? route('dashboard.category.update', $resource->id) : route('dashboard.category.store') }}"
        method="post" enctype="multipart/form-data">
        @csrf
        @if ($resource->id)
          @method('PUT')
        @endif
        <div class="modal-body">
          <div class="mb-2">
            {{-- <label for="exampleFormControlInput1" class="form-label"><b> Title Job</b></label> --}}
            <p><b> Title Job </b> : {{$resource->title}}</p>
          </div>
          <div class="mb-2">
            {{-- <label for="exampleFormControlTextarea1" class="form-label"><b>Category</b></label> --}}
            <p><b>Category </b> : {{optional($resource->category)->name}}</p>
          </div>
   
          <div class="mb-2">
            {{-- <label for="exampleFormControlTextarea1" class="form-label"><b>Location</b></label> --}}
            <p><b>Location</b> : {{$resource->location}}</p>
          </div>
          <div class="mb-2">
            {{-- <label for="exampleFormControlTextarea1" class="form-label"><b>Type of Job</b></label> --}}
            <p><b>Type of Job :</b>  {{$resource->type}}</p>
          </div>
          <div class="mb-2">
            {{-- <label for="exampleFormControlTextarea1" class="form-label"><b>Salary</b></label> --}}
            <p><b>Salary :</b> {{$resource->min_salary}} {{$resource->max_salary ? ' - '. $resource->max_salary : ''}}</p>
          </div>
          <div class="mb-2">
            {{-- <label for="exampleFormControlTextarea1" class="form-label"><b>Job DeadLine</b></label> --}}
            <p><b>Job DeadLine :</b> {{$resource->application_deadline}}</p>
          </div>
          <div class="mb-2">
            {{-- <label for="exampleFormControlTextarea1" class="form-label"><b>Status</b></label> --}}
            <p><b>Status :</b> {{$resource->status}}</p>
          </div>
          <div class="mb-2">
            <label for="exampleFormControlTextarea1" class="form-label"><b>Description</b></label>
            <p>{{$resource->description}}</p>
          </div>
          <div class="pt-4 d-flex justify-content-end gap-2">

            <button type="button"
              class=" btn btn-outline-danger  ms-1 p-2 d-flex align-items-center justify-content-center gap-1"
              style="min-width: 80px" data-bs-dismiss="modal" aria-label="Close">
              close
            </button>
          </div>
      </form>

    </div>

  </div>
</div>

@include('Dashboard.layouts.formSubmit')
