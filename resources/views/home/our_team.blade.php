<!DOCTYPE html>
<html lang="en">
  <head>
    @include('home.css')
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
          <h4 class="text-white">RESEARCH</h4>
        </div>
      </div>
    </div>
    <!-- Carousel end -->


    <!-- Count journal section -->
    <!-- Count journal section -->
    <div class="container mt-5">
      <div class="row g-4">
        <!-- Left Column -->
        <div class="col-md-4">
          <div class="profile-card">
            <img src="{{ asset($teacher_personal->image) }}" alt="{{ $teacher_personal->name }}" />
            <div class="profile-details">
              <h5>{{ $teacher_personal->name }}</h5>
              <p>{{ $teacher_personal->designation }}</p>
              <div class="contact-info mt-3">
                <div><b>Call:</b> {{ $teacher_personal->call }}</div>
                <div><b>Email:</b> {{ $teacher_personal->email }}</div>
              </div>
              <div class="social-icons">
                <a href="{{ $teacher_personal->github }}"><i class="fab fa-google"></i></a>
                <a href="{{ $teacher_personal->facebook }}"><i class="fab fa-facebook"></i></a>
                <a href="{{ $teacher_personal->linkedin }}"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column (Moved inside the row) -->
        <div class="col-md-8 d-flex align-items-center">
          <div class="">
            <h3>{{ $teacher_personal->name }}</h3>
            <div>
              <p class="mb-1">{{ $teacher_personal->designation }}</p>
              <p class="mb-1">{{ $teacher_personal->university }}</p>
              <p class="mb-1">{{ $teacher_personal->location }} </p>
            </div>

            <br />
            <h6>Biography</h6>
            <p>
              {{ $teacher_personal->biography }}
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Salman sir section end -->

    <!-- Salman sir section end -->
    <div class="container mt-5">
      <div class="row g-4">
        @foreach ($students as $student)
        <div class="col-md-3">
          <div class="profile-card">
            <img src="{{ asset($student->image) }}" alt="{{ $student->name }}" />
            <div class="profile-details">
              <h5>{{ $student->name }}</h5>
              <p>{{ $student->designation }}</p>
              <div class="contact-info mt-3">
                <div><b>Call:</b> {{ $student->phone }}</div>
                <div><b>Email:</b> {{ $student->email }}</div>
              </div>
              <div class="social-icons">
                @if($student->github)
                <a href="{{ $student->github }}"><i class="fab fa-github"></i></a>
                @endif
                @if($student->facebook)
                <a href="{{ $student->facebook }}"><i class="fab fa-facebook"></i></a>
                @endif
                @if($student->twitter)
                <a href="{{ $student->twitter }}"><i class="fab fa-twitter"></i></a>
                @endif
                @if($student->linkedin)
                <a href="{{ $student->linkedin }}"><i class="fab fa-linkedin"></i></a>
                @endif
              </div>
            </div>
          </div>
        </div>
        @endforeach


      </div>
    </div>

    <!-- end card -->

    <section class="hero-section">
      <div class="hero-content">
        <h2>{{ $teacher_personal->name }} is one of England’s</h2>
        <span class="underline"></span>
        <p>
          {{ $teacher_personal->biography }}
        </p>
        <a href="#" class="btn btn-read-more mt-2">Read More</a>
      </div>
    </section>

   <footer class="bg-dark text-white">

   @include('home.footer')
  </body>
</html>
