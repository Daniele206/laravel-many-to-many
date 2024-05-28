<header>
    <nav class="navbar navbar-expand-lg bg-black my_nav_h fs-4">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('admin.home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" target="_blank" href="{{ route('home') }}">Sito Publico</a>
              </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link text-capitalize text-light" href="#">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger p_log-out text-light"><i class="fa-solid fa-right-from-bracket"></i></button>
                    </form>
                </li>
              </ul>
          </div>
        </div>
      </nav>
</header>
