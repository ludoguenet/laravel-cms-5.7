<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.index') }}">
                <span data-feather="home"></span>
                Accueil
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('homepage') }}">
                    <span data-feather="eye"></span>
                    Voir le blog
                  </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Gérer mon blog</span>
            <a class="d-flex align-items-center text-muted" href="{{ route('posts.create') }}">
              <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.index') }}"><span data-feather="layers"></span> Administrer les posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}"><span data-feather="layers"></span> Administrer les catégories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tags.index') }}"><span data-feather="layers"></span> Administrer les tags</a>
            </li>
        </ul>
    </div>
</nav>
