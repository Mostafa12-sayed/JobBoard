
@extends('Dashboard.layouts.master')

@php
  $title = "Categories";
@endphp

@section('title')
  {{ $title }}
@endsection
@section('content')


        <h1 class="p-relative">{{ $title}}</h1>

        <div class="projects p-20 bg-white rad-10 m-20">
          <div class=" d-flex justify-content-between align-items-center">
              <h2 class="mt-0 mb-20"> All{{ $title}}</h2>
              <a data-href="{{ route('dashboard.category.create') }}" data-container="#dash-table-modal"
                class="btn primary-btn  remove-marg btn-modal submit-btn  ">
                <i class="fa-solid fa-plus"></i>              
                Create New 
              </a>
          </div>

          <div class="resposive-table">
            <table class="fs-15 w-full">
              <thead>
                <tr>
                  <td>Name</td>
                  <td>Description</td>
                  <td>Status</td>
                  <td>Action</td>

                </tr>
              </thead>
              <tbody>
                @if (count($categories) > 0)
                  
                
                @foreach ($categories as $category )
                  
                <tr>
                  <td>{{$category->name}}</td>
                  <td>{{ Str::limit($category->description ,50)}}</td>
                  <td> <label>
                    <input type="checkbox" class="toggle-checkbox" data-url={{route('dashboard.category.changeStatus')}} data-id="{{ $category->id }}" {{$category->status == 'active'? 'checked' : ''}} />
                    <div class="toggle-switch"></div>
                  </label></td>
                  <td>
                    <a data-href="{{route('dashboard.category.edit',$category->id )}}" data-container="#dash-table-modal"
                      class="btn btn-modal btn-sm"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M16.8617 4.48667L18.5492 2.79917C19.2814 2.06694 20.4686 2.06694 21.2008 2.79917C21.9331 3.53141 21.9331 4.71859 21.2008 5.45083L10.5822 16.0695C10.0535 16.5981 9.40144 16.9868 8.68489 17.2002L6 18L6.79978 15.3151C7.01323 14.5986 7.40185 13.9465 7.93052 13.4178L16.8617 4.48667ZM16.8617 4.48667L19.5 7.12499M18 14V18.75C18 19.9926 16.9926 21 15.75 21H5.25C4.00736 21 3 19.9926 3 18.75V8.24999C3 7.00735 4.00736 5.99999 5.25 5.99999H10"
                        stroke="#34495E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                      </a>
                    <a href="{{route('dashboard.category.destroy', $category->id)}}" data-url="{{route('dashboard.category.destroy', $category->id)}}" class="btn delete-item  sw-alert btn-sm"><svg width="20"
                      height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M14.7404 9L14.3942 18M9.60577 18L9.25962 9M19.2276 5.79057C19.5696 5.84221 19.9104 5.89747 20.25 5.95629M19.2276 5.79057L18.1598 19.6726C18.0696 20.8448 17.0921 21.75 15.9164 21.75H8.08357C6.90786 21.75 5.93037 20.8448 5.8402 19.6726L4.77235 5.79057M19.2276 5.79057C18.0812 5.61744 16.9215 5.48485 15.75 5.39432M3.75 5.95629C4.08957 5.89747 4.43037 5.84221 4.77235 5.79057M4.77235 5.79057C5.91878 5.61744 7.07849 5.48485 8.25 5.39432M15.75 5.39432V4.47819C15.75 3.29882 14.8393 2.31423 13.6606 2.27652C13.1092 2.25889 12.5556 2.25 12 2.25C11.4444 2.25 10.8908 2.25889 10.3394 2.27652C9.16065 2.31423 8.25 3.29882 8.25 4.47819V5.39432M15.75 5.39432C14.5126 5.2987 13.262 5.25 12 5.25C10.738 5.25 9.48744 5.2987 8.25 5.39432"
                        stroke="#E74C3C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                      </a>
                  </td>
                </tr>
                @endforeach

                @else
                <tr>
                  <td colspan="4">No Categories Found</td>
                </tr>

                @endif
               
              </tbody>
            </table>
            <div class="pagination-wrapper d-flex justify-content-center mt-20">
              {{ $categories->links() }}
            </div>
          </div>
        </div>

   

@endsection

