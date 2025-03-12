@extends('Website.layouts.master')

@php
    $title = "Create Job"
@endphp
@section('title', $title)

@section('content')
    @include('Website.layouts.includes.bradcamp')

    <section class="contact-section section_padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 >Post a New Job</h2>
                </div>

                <div class="col-lg-8">
                    <form action="{{ route('website.job.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <!-- Job Title -->
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="title" type="text" value="{{ old('title') }}"
                                           placeholder="">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Job Description -->
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="description" rows="4"
                                              placeholder="">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="category" type="text" value="{{ old('category') }}"
                                           placeholder="">
                                    @if ($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="location" type="text" value="{{ old('location') }}"
                                           placeholder="">
                                    @if ($errors->has('location'))
                                        <span class="text-danger">{{ $errors->first('location') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Technologies -->
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="technologies" type="text"
                                           value="{{ old('technologies') }}" placeholder="">
                                    @if ($errors->has('technologies'))
                                        <span class="text-danger">{{ $errors->first('technologies') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Work Type -->
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" name="work_type">
                                        <option value="" disabled selected>Select Work Type</option>
                                        <option value="remote">Remote</option>
                                        <option value="onsite">Onsite</option>
                                        <option value="hybrid">Hybrid</option>
                                    </select>
                                    @if ($errors->has('work_type'))
                                        <span class="text-danger">{{ $errors->first('work_type') }}</span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>

                            <!-- Salary Range -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="salary_range" type="text"
                                           value="{{ old('salary_range') }}" placeholder="">
                                    @if ($errors->has('salary_range'))
                                        <span class="text-danger">{{ $errors->first('salary_range') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Application Deadline -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="application_deadline" type="date"
                                           value="{{ old('application_deadline') }}">
                                    @if ($errors->has('application_deadline'))
                                        <span class="text-danger">{{ $errors->first('application_deadline') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-3 text-center">
                            <button type="submit" class="button button-contactForm btn_4 boxed-btn w-100">
                                Post Job
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
