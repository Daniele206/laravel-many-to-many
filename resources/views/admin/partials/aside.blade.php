<div class="col col-1 bg-danger h-100 d-flex flex-column justify-content-between">
    <ul class="list-unstyled d-flex flex-column align-items-center">
        <li class=" lh_li">
            <a class="text-decoration-none text-light fs-6" href="{{ route('admin.home') }}"><i class="fa-solid fa-house"></i> <span>Home</span></a>
        </li>
        <li class=" lh_li">
            <a class="text-decoration-none text-light fs-6" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-boxes-stacked"></i> <span>Projects</span></a>
        </li>
        <li class=" lh_li">
            <a class="text-decoration-none text-light fs-6" href="{{ route('admin.types.index') }}"><i class="fa-solid fa-list"></i> <span>Types</span></a>
        </li>
        <li class=" lh_li">
            <a class="text-decoration-none text-light fs-6" href="{{ route('admin.technologies.index') }}"><i class="fa-solid fa-list"></i> <span>Technologies</span></a>
        </li>
        <li class=" lh_li">
            <a class="text-decoration-none text-light fs-6" href="{{ route('admin.type_projects') }}"><i class="fa-solid fa-list"></i> <span>Types-Projects</span></a>
        </li>
    </ul>
    <ul class="navbar-nav d-flex justify-content-center align-items-center pb-4">
        <li class="nav-item">
            <a class="nav-link text-capitalize text-light fs-3 fw-bold" href="#">{{ Auth::user()->name }}</a>
        </li>
        <li class="nav-item d-flex align-items-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-dark p_log-out text-light"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </li>
    </ul>
</div>
