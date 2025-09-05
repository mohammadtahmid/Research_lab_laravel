        <div class="container-fluid">
          <!-- Left side: Logo -->
        <a class="navbar-brand" href="/">
            @if($logo)
                <img src="{{ asset($logo->image) }}" alt="Logo" style="height:40px">
            @else
                <img src="{{ asset('default-logo.png') }}" alt="Default Logo" style="height:40px">
            @endif
        </a>

          <!-- Right side: Button and Menu -->
          <div class="d-flex flex-column align-items-end w-100">
            <!-- Top: Join Button -->
<div style="display: flex; gap: 10px;">


    @if (Route::has('login'))

    @auth
    <!-- Log Out Button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn mb-2 btn-research">
            Log Out
        </button>
    </form>

    @else

        <!-- Join Research Button -->
    <a href="{{ route('register') }}" class="btn mb-2 btn-success">
        Join Research
    </a>

    <a href="{{ route('login') }}" class="btn mb-2 btn-research">
        Log In
    </a>

    @endauth

    @endif

</div>

            <!-- Bottom: Menu aligned to right -->
            <div
              class="collapse navbar-collapse justify-content-end"
              id="navbarSupportedContent"
            >
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="/"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Home
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li>
                      <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="research.html">Research</a>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="people.html"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    People
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('home.our_team') }}">Our Team</a></li>
                    <li>
                      <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="publication.html"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Publications
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('home.article') }}">Articles</a></li>
                    <li>
                      <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="event.html"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Events
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li>
                      <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="blog.html"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Blog
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li>
                      <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                  </ul>
                <li class="nav-item">
                  <a class="nav-link" href="future_member.html">Future Member</a>
                </li>


              </ul>
            </div>
          </div>
        </div>
