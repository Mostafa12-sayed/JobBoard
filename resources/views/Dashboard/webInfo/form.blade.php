@php
  $title = "Edit Web Info";
@endphp

{{-- @section('css') --}}
  <style>
    body{
      box-sizing: border-box !important;
    }
    .model-body .row:nth-child(1) {
    width: 40% !important;
    z-index: 9999999;
    }
    .upload-btn{
      /* display: block !important; */
      /* margin-bottom: 10px !important; */
      border: 3px solid #13a0e6 !important;
      margin: 10px;
      padding: 10px;
      border-radius: 10px;
      text-align: center;
      color: #13a0e6;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      width: 100% !important;

    }
    .upload-btn:hover {
      background-color: #13a0e6 !important;
      color: white !important;
    }
  </style>
{{-- @endsection --}}

<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content ">
    <div class="modal-header">
      <h5 class="modal-title">
        {{ $title }}
      </h5>
    </div>
    <div class="modal-body">
      <form class="form"
        action="{{  route('dashboard.webInfo.update')}}"
        method="post" enctype="multipart/form-data">
       
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Name Website</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name website" value="{{ old('name', $resource->name) }}">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email', $resource->email) }}">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone" value="{{ old('phone', $resource->phone) }}">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value="{{ old('address', $resource->address) }}">
          </div>
          <div class="mb-3">
            <label for="facebook" class="form-label">Facebook</label>
            <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Enter facebook" value="{{ old('facebook', $resource->facebook) }}">
          </div>
          <div class="mb-3">
            <label for="instagram" class="form-label">Instgrame</label>
            <input type="text" name="instagram" class="form-control" id="instagram" placeholder="Enter instagram" value="{{ old('instagram', $resource->instagram) }}">
          </div>

          <div class="mb-3">
            <label for="linkedin" class="form-label">Linkedin</label>
            <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Enter linkedin" value="{{ old('linkedin', $resource->linkedin) }}">
          </div>
          <div class="mb-3">
            <label for="twitter" class="form-label">Twitter</label>
            <input type="text" name="twitter" class="form-control" id="twitter" placeholder="Enter linkedin" value="{{ old('twitter', $resource->twitter) }}">
          </div>
          <div class="mb-3">
            <label for="valueJobs" class="form-label">Number of jobs can user apply</label>
            <input type="text" name="number_of_jobs_apply" class="form-control" id="valueJobs" placeholder="Enter valu" value="{{ old('number_of_jobs_apply', $resource->number_of_jobs_apply) }}">
          </div>
          <div class="mb-3 images  d-flex justify-content-between ">
            
            <label for="logo" class="upload-btn " >
              Upload Logo
            </label>
            <label for="favicon" class=" upload-btn ">
              Upload Favicon
            </label>


            <input type="file" name="logo" class="form-control" id="logo" onchange="changeImage(this ,'logo')"  style="display: none;" >
            <input type="file" name="favicon" class="form-control" id="favicon"  onchange="changeImage(this ,'favicon')" style="display: none;" >
          </div>
          <ul class="list-unstyled d-flex align-items-center justify-content-between">
           
            <img src="{{ asset($resource->logo) }}" alt="logo" class="img-fluid image-preview-logo" style="max-width: 100px; max-height: 100px;">
       
            <img src="{{ asset($resource->favicon) }}" alt="favicon" class="img-fluid image-preview-favicon" style="max-width: 100px; max-height: 100px;">
           
          </ul>
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
