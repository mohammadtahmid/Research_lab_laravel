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

          <div>
            <h4>Upload Your Logo</h4>
          </div>
                <form method="POST" action="{{ url('add_logo') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf


                    <input
                        id="logo"
                        name="logo"
                        type="file"
                        accept="image/*"
                        class="block w-full"
                        required
                    />

                        @error('logo')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror

                    <button type="submit" class="btn btn-info">Upload</button>
                </form>
                <br><br>


        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Uploaded At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($logos as $logo)
                <tr>
                    <td>{{ $logo->id }}</td>
                    <td>
                        <img src="{{ asset($logo->image) }}" alt="Logo" width="100">
                    </td>
                    <td>{{ $logo->created_at }}</td>
                    <td>
                        <a href="{{ url('delete_logo',$logo->id) }}" onclick="confirmation(event)" class="btn btn-danger" type="button">Delete</a>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>

        </div>
      </div>
    </div>

    <script type="text/javaScript">
        function confirmation(ev){
            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href');

            console.log(urlToRedirect);

            swal({
                title:"Are you sure to Delete this?",
                text:"This delete will be parmanent",
                icon:"warning",
                buttons: true,
                dangerMode:true,
            })
            .then((willCancel)=>{
                if (willCancel) {
                    window.location.href=urlToRedirect;
                }
            });
        }
    </script>

@include('admin.footer')
  </body>
</html>
