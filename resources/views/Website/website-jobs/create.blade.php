@extends('Website.layouts.master')

@php
    $title = $job->id ? "Edit Job" : "Create Job"
@endphp
@section('title', $title)

@section('content')
    <style>
        .nice-select {
            padding-left: 10px !important
        }
        .list{
            height: 100px !important;
            overflow-y: scroll !important;
        }

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

    @include('Website.layouts.includes.bradcamp')
    
    <section class="contact-section section_padding">
        <div class="container">
            <div class="row col-lg-12">
                <div class="col-12 mb-4">
                    <h2>{{$job->id ? "Edit Job" : "Post a New Job"}}</h2>
                </div>

                <div class="col-lg-12">
                    <form action="{{ $job->id ? route('website.job.update', $job->id) : route('website.job.store') }}" method="post">
                        @csrf
                        @if($job->id)
                            @method('PUT')
                        @endif
                        <div class="row">
                            <!-- Job Title -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Title of Job</label>
                                    <input class="form-control" name="title" type="text" value="{{ old('title' , $job->title) }}"
                                           placeholder="Title">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Job Description -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Description of Job</label>

                                    <textarea class="form-control w-100" name="description" rows="4"
                                              placeholder="Description">{{ old('description' , $job->description) }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Category of Job</label>

								<div class="form-select" id="default-select" >
									<select name="category_id">
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id' , $job->category_id) == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                         @endforeach
									</select>
                                    @if ($errors->has('category_id'))
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                @endif
                                        
                            
								</div>
                            </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Type of Job</label>
								<div class="form-select" id="default-select" >
									<select name="job_type">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="full-time" {{old('job_type' , $job->job_type) == "full-time" ? "selected" : "" }}>Full Time</option>
                                        <option value="part-time" {{old('job_type' , $job->job_type) == "part-time" ? "selected" : "" }}>Part Time</option>
									</select>
                                    @if ($errors->has('job_type'))
                                    <span class="text-danger">{{ $errors->first('job_type') }}</span>
                                    @endif
								</div>
                            </div>
                            </div>

                            <!-- Location -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Lacation of Job</label>

                                    <input class="form-control" name="location" type="text" value="{{ old('location' , $job->location) }}"
                                           placeholder="Location">
                                    @if ($errors->has('location'))
                                        <span class="text-danger">{{ $errors->first('location') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Technologies -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Technologies Required of Job</label>

                                    <input class="form-control" name="technologies" type="text"
                                           value="{{ old('technologies') }}" placeholder="Technologies">
                                    @if ($errors->has('technologies' , $job->technologies))
                                        <span class="text-danger">{{ $errors->first('technologies') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Work Type -->
                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label>Worke Type of Job</label>

                                        <div class="form-select" id="default-select" >
                                        <select class="form-control" name="work_type">
                                            <option value="" disabled selected>Select Work Type</option>
                                            <option value="remote" {{old('work_type' , $job->work_type) == "remote" ? "selected" : "" }}>Remote</option>
                                            <option value="onsite" {{old('work_type' , $job->work_type) == "onsite" ? "selected" : "" }}>Onsite</option>
                                            <option value="hybrid" {{old('work_type' , $job->work_type) == "hybrid" ? "selected" : "" }}>Hybrid</option>
                                        </select>
                                        @if ($errors->has('work_type'))
                                            <span class="text-danger">{{ $errors->first('work_type') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label>Deadline for Application to Job</label>
                                        <input class="form-control" name="application_deadline" type="date"
                                            value="{{ old('application_deadline' , $job->application_deadline) }}">
                                        @if ($errors->has('application_deadline'))
                                            <span class="text-danger">{{ $errors->first('application_deadline') }}</span>
                                        @endif
                                    </div>
                                </div>
                           

                            <!-- Salary Range -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Minumim Salary of Job</label>
                                    
                                    <input class="form-control" name="min_salary" type="number"
                                           value="{{ old('min_salary' , $job->min_salary) }}" placeholder="Min Salary">
                                    @if ($errors->has('min_salary'))
                                        <span class="text-danger">{{ $errors->first('min_salary') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Maximum Salary of Job</label>

                                    <input class="form-control" name="max_salary" type="number"
                                           value="{{ old('max_salary' , $job->max_salary) }}" placeholder="Max Salary">
                                    @if ($errors->has('max_salary'))
                                        <span class="text-danger">{{ $errors->first('max_salary') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Application Deadline -->
                            
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-3 text-center">
                            <button type="submit" class="button button-contactForm btn_4 boxed-btn w-100">
                               {{$job->id ? "Edit Job" : "Post Job"}} 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        var input = document.querySelector('input[name=technologies]');
        var tagify = new Tagify(input);        
        var existingTechnologies = @json(json_decode($job->technologies, true));
        if (existingTechnologies) {
            tagify.addTags(existingTechnologies);
        }
    </script>
@endsection
