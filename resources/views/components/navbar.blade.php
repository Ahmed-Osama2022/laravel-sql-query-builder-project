<nav class="navbar navbar-expand-lg shadow bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}"><span class="fw-bold">Laravel</span><br>Users CRUD<br>App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.index') }}">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.create') }}">Create User</a>
        </li>
        {{-- <li class="nav-item"> --}}
        {{-- <a class="nav-link" href="{{ route('users.create') }}">Update User</a> --}}
        {{-- </li> --}}

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
