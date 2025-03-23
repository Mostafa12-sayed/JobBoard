@extends('Website.layouts.master')

@section('content')
<style>
    .apply_now{
        display: flex !important;
        gap: 10px;
        justify-content: flex-end;
        align-items: center;
    }
    .close{
       
        color: rgb(255, 178, 12) !important;
        font-size: 18px !important;
    }
    .close:hover{
       
        color: rgb(158, 110, 7) !important;
        transform: scale(1.5)
    }
    .danger{
        color: rgb(226, 21, 21) !important;
        background-color: transparent !important;
        border: none !important;
        transition:all 0.3s ease 0s !important;
        cursor: pointer !important;
    }
    .danger:hover{
        color: rgb(236, 92, 92) !important;
        transform: scale(1.5)

    }
    .edit{
        color: rgb(5, 159, 248) !important;
     
    }
    .edit:hover{
        color: rgb(59, 170, 235) !important;
        transform: scale(1.5)

    }
</style>
@component('Website.layouts.includes.bradcamp')

    @slot('title')
    My Jobs
    @endslot
    
@endcomponent
    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Job Listing</h4>
                                </div>
                                <div class="col-md-6">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="job_lists m-0">
                    <div class="row">
                        @if($jobs->count() == 0)
                        <div class="col-lg-12 col-md-12">
                            @component('Website.layouts.includes.alter')
                                @slot('title')
                                    No Jobs Found
                                @endslot
                                @slot('content')
                                    Sorry, no jobs found.
                                @endslot
                            @endcomponent
                        </div>
                        @else
                        @foreach($jobs as $job)
                        <div class="col-lg-12 col-md-12">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{ asset('img/svg_icon/1.svg') }}" alt="">
                                    </div>
                                    <div class="jobs_conetent">
                                        <a href="{{ route('website.jobs.show', $job->id) }}"><h4>{{ $job->title }}</h4></a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p><i class="fa fa-map-marker"></i> {{ $job->location }}</p>
                                            </div>
                                            <div class="location">
                                                <p><i class="fa fa-clock-o"></i> {{ $job->work_type }}</p>
                                            </div>
                                            <div class="location">
                                                <p>Deadline: {{ $job->application_deadline }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        <a href="{{ route('website.job.edit', $job->id) }}" title="View Job" class="edit" ><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a data-id="{{ $job->id }}" data-url="{{ route('website.job.destroy', $job->id) }}" onclick="deleteJob(this , event)" class="danger delete-item" title="Delete Job"><i class="fa-solid fa-trash"></i></a>
                                        <a href="{{ route('website.jobs.close', $job->id) }}" title="Open Job" class=" close" >
                                            @if($job->applicable_status == 'closed')
                                            <i class="fa-solid fa-lock-open"></i>
                                            @else
                                            <i class="fa-solid fa-lock"></i>
                                            @endif
                                        
                                        </a>
                                        {{-- <a href="#" class="genric-btn primary-border circle arrow">Close</a> --}}
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- <div class="col-lg-12 col-md-12">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{ asset('img/svg_icon/1.svg') }}" alt="">
                                    </div>
                                    <div class="jobs_conetent">
                                        <a href="{{ route('website.jobs.show',1) }}"><h4> dhdrhdrh </h4></a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p><i class="fa fa-map-marker"></i>rsdhrhdrh</p>
                                            </div>
                                            <div class="location">
                                                <p><i class="fa fa-clock-o"></i> segegssegse</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        <a href="{{ route('website.jobs.show', 1) }}" class="boxed-btn3">Closed</a>
                                    </div>
                                    <div class="date">
                                        <p>Deadline:</p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pagination_wrap">
                                {{ $jobs->links() }} <!-- Pagination -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End container -->
</div> 

<script>
        function deleteJob(but ,e) {
            console.log(but);
            e.preventDefault();
            var $button = $(but);
            var url = $button.data('url');
            var id = $button.data('id');
            Swal.fire({
            title: "Info",
            text: "Are you sure you want to delete this item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!"
            }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url; 
            }
            });
        }


</script>
@endsection
