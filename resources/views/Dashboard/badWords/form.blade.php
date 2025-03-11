@php
  $title = $resource->id ? "Edit Word" : "Add Word";
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
        action="{{ $resource->id ? route('dashboard.badWord.update', $resource->id) : route('dashboard.badWord.store') }}"
        method="post" enctype="multipart/form-data">
        @csrf
        @if ($resource->id)
          @method('PUT')
        @endif
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Word</label>
            <input type="text" name="word" class="form-control" id="exampleFormControlInput1" placeholder="Enter word" value="{{ old('word', $resource->title) }}">
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
