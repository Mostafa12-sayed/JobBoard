@extends('dashboard.layouts.master')

@php
    $title = 'Profile';
@endphp

@section('title')
    {{ $title }}
@endsection

@section('css')
@endsection

@section('content')
<style>
    .student_image{
        background-color: gainsboro;
        width:150px ;
        height: 150px;
        border-radius: 50%;
        margin: auto;
        border:4px dashed #0b90eee1;
    }
    .student_image img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
</style>
    <div class="row p-2 d-flex flex-column align-items-center m-auto">
        <div class="col-md-4">
            <form action="{{route('dashboard.profile.update')}}" method="post" enctype="multipart/form-data">
                @csrf

            <div class="col-12 pt-3 text-center" >
                    <div class="student_image position-relative" >
                        <img class="image-preview-image"    src="{{ asset($resource->image ?? 'assets/img/default.jpg' ) }}">
                        <label for="image"class="btn btn-primary text-white p-1 " style="top: 130px;position: absolute; left: 40%  ;  min-height: 5px; ">
                            <i class="fa-solid fa-cloud-arrow-up"></i>                        
                        </label>
                    </div>
                <br>
                <input type="file" onchange="changeImage(this, 'image')" id="image" class="d-none form-control mt-3" name="image" >
            </div>
        </div>
        <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 pt-2">
                            <div class="form-group">
                               <label for="phone">Name</label>
                               <input type="text" name="name" class="form-control" id="name" value="{{ $resource->name }}">
                            </div>
                        </div>

                        <div class="col-md-6 pt-2">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="{{ $resource->username }}" >
                            </div>
                        </div>

                        <div class="col-md-6 pt-2">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ $resource->email }}" >
                            </div>
                        </div>


                        <div class="col-md-12 pt-2">
                            <div class="form-group">
                               <label for="phone">Phone Number</label>
                               <input type="text" name="phone" class="form-control" id="phone" value="{{ $resource->phone }}">
                            </div>
                        </div>



                        <div class="col-md-12 pt-2">
                            <div class="form-group">
                               <label for="password">Password</label>
                               <input type="password" autocomplete="new-password" name="password" class="form-control" id="password" value="">
                            </div>
                        </div>



                        <div class="col-md-12  pt-3 text-center">
                           <button type="submit" class="btn btn-primary">Edit</button>
                        </div>

                    </div>
                </form>
                {{-- @endslot
            @endcomponent --}}
        </div>
    </div>
    <script>
          function previewImage(input) {
                const file = input.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                const imagePreview = document.getElementById('image-preview');
                imagePreview.style.display = 'block';
                imagePreview.src = e.target.result;
                };  
                if (file) {
                reader.readAsDataURL(file);
                }
            }
    </script>
@endsection
