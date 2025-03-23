@extends('Website.layouts.master')

@section('content')
<style>
    .apply_now {
        display: flex !important;
        gap: 10px;
        justify-content: flex-end;
        align-items: center;
    }
    .btn-action {
        padding: 5px 10px;
        font-size: 14px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .btn-accept {
        background-color: #28a745;
        color: white;
    }
    .btn-accept:hover {
        background-color: #218838;
    }
    .btn-reject {
        background-color: #dc3545;
        color: white;
    }
    .btn-reject:hover {
        background-color: #c82333;
    }
</style>

@component('Website.layouts.includes.bradcamp')
    @slot('title')
        Applications for {{ $job->title }}
    @endslot
@endcomponent

<div class="job_listing_area plus_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="recent_joblist_wrap">
                    <div class="recent_joblist white-bg">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4>Job Applications</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job_lists m-0">
                    <div class="row">
                        @if($job->applications->isEmpty())
                            <div class="col-lg-12 col-md-12">
                                @component('Website.layouts.includes.alter')
                                    @slot('title')
                                        No Applications Yet
                                    @endslot
                                    @slot('content')
                                        There are no applications for this job yet.
                                    @endslot
                                @endcomponent
                            </div>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($job->applications as $application)
                                        <tr>
                                            <td>{{ $application->name }}</td>
                                            <td>{{ $application->email }}</td>
                                            <td>{{ $application->phone }}</td>
                                            <td>{{ ucfirst($application->status) }}</td>
                                            <td class="apply_now">
                                                <a href="{{ route('job.accept', ['jobId' => $job->id, 'applicationId' => $application->id]) }}" class="btn-action btn-accept">Accept</a>
                                                <a href="{{ route('job.reject', ['jobId' => $job->id, 'applicationId' => $application->id]) }}" class="btn-action btn-reject">Reject</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
