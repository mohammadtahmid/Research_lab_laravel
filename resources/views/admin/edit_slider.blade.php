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

              <h2>Update Slider</h2>
    <form action="{{ route('update_slider', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ $slider->title }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $slider->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Current Image</label><br>
            <img src="{{ asset($slider->image) }}" width="150">
        </div>

        <div class="form-group">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ url('view_slide') }}" class="btn btn-secondary">Back</a>
    </form>

            </div>
      </div>
    </div>
@include('admin.footer')
  </body>
</html>
