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

<form action="{{ route('teacher_personal_update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                @if($teacher->image)
                    <img src="{{ asset($teacher->image) }}" alt="Teacher Image" class="img-thumbnail mb-2" style="width:100px; height:100px;">
                @endif
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $teacher->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Designation</label>
            <input type="text" name="designation" value="{{ $teacher->designation }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>University</label>
            <input type="text" name="university" value="{{ $teacher->university }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" value="{{ $teacher->location }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Call</label>
            <input type="text" name="call" value="{{ $teacher->call }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $teacher->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Biography</label>
            <textarea name="biography" class="form-control" rows="3">{{ $teacher->biography }}</textarea>
        </div>

        <div class="mb-3">
            <label>Facebook</label>
            <input type="url" name="facebook" value="{{ $teacher->facebook }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>LinkedIn</label>
            <input type="url" name="linkedin" value="{{ $teacher->linkedin }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>GitHub</label>
            <input type="url" name="github" value="{{ $teacher->github }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
        <a href="{{ route('teacher_info') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
    </form>


            </div>
      </div>
    </div>
@include('admin.footer')
  </body>
</html>
