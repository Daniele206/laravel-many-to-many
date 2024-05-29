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
            <div class="w-25">
                <form method="POST" action="{{ route('admin.filter') }}" class="d-flex" role="search">
                    @csrf
                    <input class="form-control me-2" type="search" name="name" placeholder="Cerca" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Cerca</button>
                </form>
            </div>
          </div>
        </div>
      </nav>
</header>
