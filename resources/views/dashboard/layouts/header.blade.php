<header class="navbar navbar-light sticky-top bg-light flex-md-nowrap shadow-sm">
  <a class="navbar-brand bg-light col-md-3 col-lg-2 me-0 px-3 fw-bold" href="#">Plagro.id</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control w-100 rounded-pill bg-light border border-success ms-3" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="post">
        @csrf
        <button class="nav-link px-3 mx-3 bg-success text-dark bg-opacity-25 border-0 rounded-pill" href="#">Logout</button>
      </form>
    </div>
  </div>
</header>