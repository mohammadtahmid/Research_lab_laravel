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

            <form action="{{ route('research_paper') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
                @csrf

                <h3 class="mb-3 text-primary"><i class="fa fa-file-alt"></i> Upload Research Paper</h3>

                <!-- Paper Title -->
                <div class="mb-3">
                    <label class="form-label">Paper Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter research paper title" required>
                </div>

                <!-- Authors -->
                <div class="mb-3">
                    <label class="form-label">Authors</label>
                    <input type="text" name="authors" class="form-control" placeholder="e.g. John Doe, Jane Smith" required>
                </div>

                <!-- Abstract -->
                <div class="mb-3">
                    <label class="form-label">Abstract</label>
                    <textarea name="abstract" class="form-control" rows="4" placeholder="Write a short summary of the paper"></textarea>
                </div>

                <!-- Keywords -->
                <div class="mb-3">
                    <label class="form-label">Keywords</label>
                    <input type="text" name="keywords" class="form-control" placeholder="e.g. AI, Machine Learning, Data Science">
                </div>

                <!-- Paper Year -->
                <div class="mb-3">
                    <label class="form-label">Paper Year</label>
                    <input type="number" name="paper_year" class="form-control" placeholder="e.g. 2023" min="1900" max="2099" step="1" required>
                </div>

                <!-- Paper Date -->
                <div class="mb-3">
                    <label class="form-label">Paper Date</label>
                    <input type="date" name="paper_date" class="form-control" required>
                </div>

                <!-- Journal/Conference -->
                <div class="mb-3">
                    <label class="form-label">Journal/Conference Name</label>
                    <input type="text" name="journal" class="form-control" placeholder="Enter journal or conference name">
                </div>

                <!-- DOI / Link -->
                <div class="mb-3">
                    <label class="form-label">DOI / Link</label>
                    <input type="text" name="doi" class="form-control" placeholder="e.g. https://doi.org/...">
                </div>

                <!-- Upload PDF -->
                <div class="mb-3">
                    <label class="form-label">Upload Paper (PDF)</label>
                    <input type="file" name="paper_file" class="form-control" accept=".pdf" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-upload"></i> Upload Paper
                </button>
            </form>

<br><br><br>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Authors</th>
                <th>Journal</th>
                <th>Year</th>
                <th>Date</th>
                <th>DOI / Link</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $key => $article)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->authors }}</td>
                <td>{{ $article->journal }}</td>
                <td>{{ $article->paper_year }}</td>
                <td>{{ \Carbon\Carbon::parse($article->paper_date)->format('d M, Y') }}</td>
                <td>
                    <a href="{{ $article->doi }}" target="_blank">{{ $article->doi }}</a>
                </td>
                <td>
                    @if($article->paper_file)
                        <a href="{{ url('uploads/research_papers/'.$article->file_path) }}" target="_blank">View File</a>
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <a href="" class="btn btn-sm btn-warning">Edit</a>

                    <form action="" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this paper?');">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">No research papers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>



            </div>
      </div>
    </div>
@include('admin.footer')
  </body>
</html>
