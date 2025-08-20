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
            <h3>Student info Update form</h3>
            <form action="{{ route('upload_student') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="image">Profile Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter student name" required>
                </div>

                <div class="form-group mb-3">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" class="form-control" placeholder="e.g. Computer Science Student" required>
                </div>

                <div class="form-group mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
                </div>

                <hr>
                <h5 class="mt-3 mb-3">Social Media Links</h5>

                <div class="form-group mb-3">
                    <label for="facebook">Facebook</label>
                    <input type="url" name="facebook" class="form-control" placeholder="https://facebook.com/username">
                </div>

                <div class="form-group mb-3">
                    <label for="twitter">Twitter</label>
                    <input type="url" name="twitter" class="form-control" placeholder="https://twitter.com/username">
                </div>

                <div class="form-group mb-3">
                    <label for="github">GitHub</label>
                    <input type="url" name="github" class="form-control" placeholder="https://github.com/username">
                </div>

                <button type="submit" class="btn btn-success mt-3">Save Information</button>
            </form>

            <br><br><br>

        <h2>Student list</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Facebook</th>
                <th>Twitter</th>
                <th>GitHub</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>

                <td>
                    @if($student->image)
                        <img src="{{ asset($student->image) }}" width="50" height="50" class="rounded-circle">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>

                <td>{{ $student->name }}</td>
                <td>{{ $student->designation }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->email }}</td>

                <td>
                    @if($student->facebook)
                        <a href="{{ $student->facebook }}" target="_blank"><i class="fa fa-facebook fa-2x text-success"></i></a>
                    @endif
                </td>
                <td>
                    @if($student->twitter)
                        <a href="{{ $student->twitter }}" target="_blank"><i class="fa fa-twitter fa-2x text-success"></i></a>
                    @endif
                </td>
                <td>
                    @if($student->github)
                        <a href="{{ $student->github }}" target="_blank"><i class="fa fa-github fa-2x text-success"></i></a>
                    @endif
                </td>

                <td>
                    <a href="{{ url('student_edit/'.$student->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{ url('delete_student/'.$student->id) }}" onclick="confirmation(event)" class="btn btn-info btn-sm">Delete</a>



                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->links() }}

          </div>
      </div>
    </div>
@include('admin.footer')
  </body>
</html>
