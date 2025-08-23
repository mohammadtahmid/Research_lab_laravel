<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
  </head>
  <body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

      @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

<form action="{{ route('teacher_detail_update', $detail->id) }}" method="POST">
    @csrf
    @method('PUT')

    <h4 class="mb-3 text-primary">Education</h4>
    <div class="row mb-3">
        <div class="col">
            <label>Ending Year</label>
            <input type="text" name="edu_year" value="{{ $detail->edu_year }}" class="form-control">
        </div>
        <div class="col">
            <label>Degree Name</label>
            <input type="text" name="edu_degree" value="{{ $detail->edu_degree }}" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label>University</label>
            <input type="text" name="edu_university" value="{{ $detail->edu_university }}" class="form-control">
        </div>
        <div class="col">
            <label>Location</label>
            <input type="text" name="edu_location" value="{{ $detail->edu_location }}" class="form-control">
        </div>
    </div>

    <h4 class="mb-3 text-success">Professional Appointments</h4>
    <div class="row mb-3">
        <div class="col">
            <label>Start Year</label>
            <input type="text" name="pro_start" value="{{ $detail->pro_start }}" class="form-control">
        </div>
        <div class="col">
            <label>End Year</label>
            <input type="text" name="pro_end" value="{{ $detail->pro_end }}" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label>Designation</label>
            <input type="text" name="pro_designation" value="{{ $detail->pro_designation }}" class="form-control">
        </div>
        <div class="col">
            <label>Organization</label>
            <input type="text" name="pro_organization" value="{{ $detail->pro_organization }}" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label>Location</label>
            <input type="text" name="pro_location" value="{{ $detail->pro_location }}" class="form-control">
        </div>
    </div>

    <h4 class="mb-3 text-warning">Awards & Prizes</h4>
    <div class="row mb-3">
        <div class="col">
            <label>Year</label>
            <input type="text" name="award_year" value="{{ $detail->award_year }}" class="form-control">
        </div>
        <div class="col">
            <label>Organization</label>
            <input type="text" name="award_org" value="{{ $detail->award_org }}" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label>Location</label>
            <input type="text" name="award_location" value="{{ $detail->award_location }}" class="form-control">
        </div>
        <div class="col">
            <label>Responsibility</label>
            <input type="text" name="award_responsibility" value="{{ $detail->award_responsibility }}" class="form-control">
        </div>
    </div>

    <button type="submit" class="btn btn-success mt-3">Update Information</button>
    <a href="{{ route('teacher_info') }}" class="btn btn-secondary mt-3">Back</a>
</form>

            </div>
      </div>
    </div>
@include('admin.footer')
  </body>
</html>
