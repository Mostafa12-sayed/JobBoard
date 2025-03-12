@extends('Website.layouts.master')

@section('content')
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Edit Job</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container m-4">
    <h2>Edit Job</h2>
    <form action="{{ route('website.job.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $job->title }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $job->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" class="form-control" value="{{ $job->category }}" required>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="{{ $job->location }}" required>
        </div>
        <div class="form-group">
            <label>Technologies</label>
            <input type="text" name="technologies" class="form-control" value="{{ $job->technologies }}" required>
        </div>
        <div class="form-group">
            <label>Work Type</label>
            <select name="work_type" class="form-control">
                <option value="remote" {{ $job->work_type == 'remote' ? 'selected' : '' }}>Remote</option>
                <option value="onsite" {{ $job->work_type == 'onsite' ? 'selected' : '' }}>Onsite</option>
                <option value="hybrid" {{ $job->work_type == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>
        </div>
        <div class="form-group">
            <label>Salary Range</label>
            <input type="text" name="salary_range" class="form-control" value="{{ $job->salary_range }}" required>
        </div>
        <div class="form-group">
            <label>Application Deadline</label>
            <input type="date" name="application_deadline" class="form-control" value="{{ $job->application_deadline }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
</div>
@endsection
