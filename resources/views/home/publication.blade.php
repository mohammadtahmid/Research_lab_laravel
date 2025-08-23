
    <div class="col-md-7">
      <div class="bg-white p-4 shadow rounded position-relative" style="z-index: 2;">
        <!-- Publication Item (repeatable) -->
@foreach($articles as $article)
    <div class="d-flex mb-4 p-3">
      <div class="me-3">
        <div class="rounded-circle border border-danger d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
          <i class="bi bi-journal-text text-danger"></i>
        </div>
      </div>
      <div>
        <h6 class="fw-bold">{{ $article->title }}</h6>
        <small class="text-muted">{{ $article->authors }}</small>
        <div>
          <a href="{{ $article->doi }}" class="small"><i class="bi bi-box-arrow-up-right me-1"></i></a>
        </div>
      </div>
    </div>
@endforeach



      </div>
    </div>
