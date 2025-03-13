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

        <!-- Title -->
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $job->title) }}" required>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $job->description) }}</textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Category (Dropdown) -->
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                <option value="" disabled>Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $job->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Location -->
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $job->location) }}" required>
            @error('location') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Technologies -->
        <div class="form-group">
            <label>Technologies</label>
            <input type="text" name="technologies" class="form-control" value="{{ old('technologies', $job->technologies) }}" required>
            @error('technologies') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Work Type -->
        <div class="form-group">
            <label>Work Type</label>
            <select name="work_type" class="form-control">
                <option value="remote" {{ old('work_type', $job->work_type) == 'remote' ? 'selected' : '' }}>Remote</option>
                <option value="onsite" {{ old('work_type', $job->work_type) == 'onsite' ? 'selected' : '' }}>Onsite</option>
                <option value="hybrid" {{ old('work_type', $job->work_type) == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>
            @error('work_type') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Min Salary -->
        <div class="form-group">
            <label>Min Salary</label>
            <input type="number" name="min_salary" class="form-control" value="{{ old('min_salary', $job->min_salary) }}" required>
            @error('min_salary') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Max Salary -->
        <div class="form-group">
            <label>Max Salary</label>
            <input type="number" name="max_salary" class="form-control" value="{{ old('max_salary', $job->max_salary) }}">
            @error('max_salary') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Application Deadline -->
        <div class="form-group">
            <label>Application Deadline</label>
            <input type="date" name="application_deadline" class="form-control" value="{{ old('application_deadline', $job->application_deadline) }}" required>
            @error('application_deadline') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
</div>
@endsection
