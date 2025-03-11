<div class="card-body">
  <form method="GET" action="{{ route('dashboard.jobs.index') }}">

      <div class="row">
          <!-- Title Input -->
          <div class="col-12 col-md-6 col-lg-2">
              <div class="form-group position-relative">
                  <input type="text" name="title" id="title" placeholder="Enter Job Title" class="form-control search-box" value="{{ request('title') }}">
                  <button class="close-icon" type="button" onclick="resetInput('title')"></button>
              </div>
          </div>

          <!-- Category Input -->
          <div class="col-12 col-md-6 col-lg-2 mb-4">
              <div class="form-group position-relative">
                  <select name="category" id="category" class="form-control">
                      <option value="">All Categories</option>
                      @foreach(\App\Models\Category::all() as $category)
                          <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

          <!-- Type Input -->
          <div class="col-12 col-md-6 col-lg-2 mb-4">
              <div class="form-group position-relative">
                  <select name="type" id="type" class="form-control">
                      <option value="">All Types</option>
                      <option value="full-time" {{ request('type') == 'full-time' ? 'selected' : '' }}>Full Time</option>
                      <option value="part-time" {{ request('type') == 'part-time' ? 'selected' : '' }}>Part Time</option>
                      <option value="contract" {{ request('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                      <option value="temporary" {{ request('type') == 'temporary' ? 'selected' : '' }}>Temporary</option>
                  </select>
              </div>
          </div>

        


          <!-- Salary Input -->
          <div class="col-12 col-md-6 col-lg-2">
              <div class="form-group position-relative">
                  <input type="text" placeholder="Enter Salary" name="salary" id="salary" class="form-control search-box" value="{{ request('salary') }}">
                  <button class="close-icon" type="button" onclick="resetInput('salary')" ></button>

              </div>
          </div>
           <!-- Type Input -->
           <div class="col-12 col-md-6 col-lg-2 mb-4">
            <div class="form-group position-relative">
                <select name="status" id="status" class="form-control">
                    <option value="">All</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Panding</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                  
                </select>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-2  ">
          <div class=" d-flex justify-content-center align-items-center gap-1">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-filter"></i> </button>
            <a href="{{ route('dashboard.jobs.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrows-rotate"></i></a>
       
      </div>
      </div>

  </form>
</div>
