    <div class="carousel-inner">
        <!-- Slide 1 -->
         @foreach($sliders as $key => $slider)

        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
          <img
            src="{{ asset($slider->image) }}"
            class="d-block w-100"
            style="height: 400px"
            alt="Slide {{ $key+1 }}"
          />
          <div class="carousel-caption">
            <div class="carousel-caption-custom text-center">
              <h2>{{ $slider->title }}</h2>
              <p>
                {{ $slider->description }}
              </p>
              <a href="#">READ MORE</a>
            </div>
          </div>
        </div>
        @endforeach
    </div>

      <!-- Controls -->
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#researchCarousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#researchCarousel"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
