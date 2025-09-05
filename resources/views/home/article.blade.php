<!DOCTYPE html>
<html lang="en">
  <head>
    @include('home.css')
  <style>
    .nav-pills .nav-link.active {
      background-color: #d90000;
      color: #fff;
    }
    .nav-pills .nav-link {
      color: #000;
      border-radius: 0;
    }
    .article-row {
      border-bottom: 1px solid #ddd;
      padding: 15px 0;
      font-size: 14px;
    }
    .article-title {
      font-style: italic;
    }
    .article-doi {
      font-size: 13px;
    }
    .pdf-link {
      color: red;
      text-decoration: none;
      font-weight: bold;
      margin-left: 10px;
    }
  </style>
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg">

            @include('home.header')

      </nav>
    </div>
    <!-- Nav-ber end -->
    <!-- Nav-ber end -->

    <!-- Carousel HTML -->

    <div class="w-100">
      <div class="position-relative" style="height: 250px; overflow: hidden">
        <!-- Background Image -->
        <img
          src="assets/img/slider/images (2).jpeg"
          class="w-100 position-absolute top-0 start-0"
          style="height: 250px; object-fit: cover"
          alt="Background"
        />

        <!-- Red Transparent Overlay -->
        <div
          class="position-absolute bottom-0 start-50 translate-middle-x"
          style="
            background-color: rgba(217, 0, 0, 0.75);
            z-index: 2;
            padding: 2px 15px;
            border-radius: 3px;
          "
        >
          <h4 class="text-white">JOURNAL ARTICLES</h4>
        </div>
      </div>
    </div>
    <!-- Carousel end -->
    <!-- Carousel end -->
    <div class="container py-5">

        <p><b>Disclaimer: </b>"Text" refers to a body of written words, such as a book or message, or the act of sending a written message, like a text message. The term can also refer to the original wording of a work or a specific passage from a source. In a broader literary theory context, a text is anything that can be "read" and interpreted, including non-written things like a city's layout or cloth</p>


    <!-- Tab Content -->
    <ul class="nav nav-pills justify-content-center mb-4" id="yearTabs">
        @foreach($articles_page as $year => $items)
            <li class="nav-item">
                <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill" href="#y{{ $year }}">
                    {{ $year }}
                </a>
            </li>
        @endforeach
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">

      <!-- 2016-2017 -->
@foreach($articles_page as $year => $items)
    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="y{{ $year }}">
        <h4 class="mb-4 text-center">{{ $year }}</h4>

        @forelse($items as $paper)
            <div class="row article-row">
                <!-- Left side (Author & ID) -->
                <div class="col-md-3">
                    <strong>{{ $paper->id }}</strong> {{ $paper->authors }}
                </div>

                <!-- Middle (Title, Journal, Year, PDF link) -->
                <div class="col-md-6">
                    {{ $paper->title }},
                    <span class="article-title">{{ $paper->journal }}</span>, {{ $paper->paper_year }}.
                    @if($paper->doi)
                        <a href="{{ $paper->doi }}" class="pdf-link">PDF</a>
                    @elseif($paper->paper_file)
                        <a href="{{ asset('storage/'.$paper->paper_file) }}" class="pdf-link" target="_blank">PDF</a>
                    @endif
                </div>

                <!-- Right side (DOI) -->
                <div class="col-md-3 article-doi">
                    @if($paper->doi)
                        DOI: <a href="{{ $paper->doi }}">{{ $paper->doi }}</a>
                    @endif
                </div>
            </div>
        @empty
            <p>No data available.</p>
        @endforelse
    </div>
@endforeach



    </div>
    </div>

    <!-- First card end -->
    <!-- First card end -->

   <footer class="bg-dark text-white">

   @include('home.footer')
  </body>
</html>
