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


    <h2>Add New Slider</h2>
    <form action="{{ url('upload_slider') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Image -->
        <div class="form-group mb-3">
            <label for="image">Slider Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <!-- Title -->
        <div class="form-group mb-3">
            <label for="title">Slider Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter slider title" required>
        </div>

        <!-- Text -->
        <div class="form-group mb-3">
            <label for="text">Slider Text</label>
            <textarea name="description" class="form-control" placeholder="Enter slider text" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-info">Upload Slider</button>
    </form>

    <br><br>

                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td>
                                <img src="{{ asset($slider->image) }}" alt="slider image" width="100">
                            </td>
                            <td>{{ $slider->title }}</td>
                            <td>{!! Str::limit($slider->description,50) !!}</td>
                            <td>
                                <a href="{{ url('edit_slider/'.$slider->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('delete_slider/'.$slider->id) }}" onclick="confirmation(event)" class="btn btn-primary">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $sliders->onEachSide(1)->links() }}


            </div>
      </div>
    </div>






@include('admin.footer')
  </body>
</html>
