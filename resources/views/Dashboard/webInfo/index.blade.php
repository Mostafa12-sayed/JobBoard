
@extends('Dashboard.layouts.master')

@php
  $title = "Website Info";
@endphp

@section('title')
  {{ $title }}
@endsection
@section('content')


        <h1 class="p-relative">{{ $title}}</h1>
        <div class="projects p-20 bg-white rad-10 m-20">
          <div class=" d-flex justify-content-between align-items-center">
              <h2 class="mt-0 mb-20">{{ $title}}</h2>
              <a data-href="{{ route('dashboard.webInfo.edit') }}" data-container="#dash-table-modal"
                class="btn primary-btn  remove-marg btn-modal submit-btn  ">
                <i class="fa-solid fa-plus"></i>              
                Edit
              </a>
          </div>

          <div class="resposive-table">
            <table class="fs-15 w-full">
              <thead>
                <tr>
                  <td>Name</td>
                  <td>Value</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Email</td>
                  <td>{{$websiteInfo->email ?? 'N/A'}}</td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td>{{$websiteInfo->phone ?? 'N/A'}}</td>
                </tr>
                <tr>
                  <td>Facebook</td>
                  <td>{{$websiteInfo->facebook ?? 'N/A'}}</td>
                </tr>
                <tr>
                  <td>Instegarm</td>
                  <td>{{$websiteInfo->instagram ?? 'N/A'}}</td>
                </tr>
                <tr>
                  <td>Twitter</td>
                  <td>{{$websiteInfo->twitter ?? 'N/A'}}</td>
                </tr>
                <tr>
                  <td>Linkedin</td>
                  <td>{{$websiteInfo->linkedin ?? 'N/A'}}</td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td>{{$websiteInfo->address ?? 'N/A'}}</td>
                </tr>
                <tr>
                  <td>Logo</td>
                  <td>
                    @if($websiteInfo->logo )
                      <img src="{{asset($websiteInfo->logo)}}" alt="Logo" width="150px">
                    @else
                      N/A
                    @endif
                  </td>
                </tr>

                <tr>
                  <td>Icon</td>
                  <td>         
                    @if($websiteInfo->favicon )
                    <img src="{{asset($websiteInfo->favicon)}}" alt="favicon" width="150px">
                  @else
                    N/A
                  @endif
                  </td>
                </tr>
               
              </tbody>
            </table>
          </div>
        </div>

   

@endsection

