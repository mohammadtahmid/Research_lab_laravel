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
    <div id="researchCarousel" class="carousel slide" data-bs-ride="carousel">

        @include('home.carousel')

    </div>
    <!-- Carousel end -->
    <!-- Carousel end -->

    <div class="container mt-5">

        @include('home.method')

    </div>
    <!-- First card end -->
    <!-- First card end -->

    <div class="container pt-5">
      <div class="row">
        @include('home.latest_mathod')

        @include('home.latest_mathodology')

        @include('home.latest_event')

      </div>
    </div>

    <!-- end card -->
    <!-- end card -->

    <div class="container pt-5">

        @include('home.total_event')

    </div>

    <!-- Count journal section -->
    <!-- Count journal section -->


<div class="container py-5">
  <div class="row">
    <!-- Left Column -->
    @include('home.about_publication')

    <!-- Right Column -->
    @include('home.publication')
  </div>
</div>

<!-- Research List show end -->
<!-- Research List show end -->



<div class="container py-5">
  <div class="row">

    @include('home.founder')

  </div>
</div>

<!-- Founder Details end -->
<!-- Founder Details end -->


    <div class="container pt-5">
      <div class="row">

        @include('home.student')

      </div>
      <div class="d-flex justify-content-end py-4">
                      <a
                href="#"
                style="
                  color: #b80000;
                  text-decoration: underline;
                  font-weight: bold;
                "
                class=""
                >VIEW ALL</a
              >
      </div>
    </div>
  <!-- Research member end -->
  <!-- Research member end -->
   <footer class="bg-dark text-white">

   @include('home.footer')
  </body>
</html>
