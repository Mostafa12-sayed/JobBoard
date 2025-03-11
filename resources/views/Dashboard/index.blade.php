
@extends('Dashboard.layouts.master')

@php
  $title = "Dashboard";
@endphp

@section('title')
  {{ $title }}
@endsection
@section('content')
        <h1 class="p-relative">Dashboard</h1>

        <div class="plans box m-20  gap-20 ">
          <!-- start plans box -->
          <div class="box bg-white rad-6 p-relative p-20 w-100 d-flex flex-wrap flex-grow-1  justify-content-between align-items-center gap-3">
            <div class="flex-grow-1" style="">
              <div class="price blue">
                <span class="d-block fw-bold mb-2">      
                  <i class="fa-solid fa-users mr-5"></i>Users</span>
                <span class="d-block plan-price">{{\App\Models\User::count()}}</span>
              </div>
            </div>
          <div class="flex-grow-1">
            <div class="price blue">
              <span class="d-block fw-bold mb-2"><i class="fa-solid fa-list mr-5"></i>Category</span>
              <span class="d-block plan-price">{{\App\Models\Category::count()}}</span>
            </div>
          </div>
          <div class="flex-grow-1">
            <div class="price blue">
              <span class="d-block fw-bold mb-2"><i class="fa-solid fa-list mr-5"></i> Jobs</span>
<<<<<<< HEAD
              <span class="d-block plan-price">{{\App\Models\Category::count()}}</span>
=======
              <span class="d-block plan-price">{{\App\Models\Jobs::count()}}</span>
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
            </div>
          </div>

        </div>
        
 
   
@endsection