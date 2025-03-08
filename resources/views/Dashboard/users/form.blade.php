@php
  $title = $resource->id ? "Edit Category" : "Add Category";
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
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name Category</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter name category" value="{{ old('name', $resource->name) }}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Write Description">{{$resource->description ?? ''}}</textarea>
          </div>
          <div class="pt-4 d-flex justify-content-end gap-2">
            <button type="submit"
              class="btn btn-primary  p-2 px-4 d-flex align-items-center justify-content-center gap-1"
              style="min-width: 120px">
              <i class="fa-solid fa-plus"></i>              
              {{$resource->id ? "edit" : 'add' }}
            </button>
            <button type="button"
              class=" btn btn-outline-danger ms-1 p-2 d-flex align-items-center justify-content-center gap-1"
              style="min-width: 80px" data-bs-dismiss="modal" aria-label="Close">
            close
            </button>
          </div>
      </form>

    </div>

  </div>
</div>

@include('Dashboard.layouts.formSubmit')
