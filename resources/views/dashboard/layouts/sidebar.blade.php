<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky mt-4">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/criterias*') ? 'active' : '' }}" href="/dashboard/criterias">
          <span data-feather="list"></span>
          Kriteria
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/profiles*') ? 'active' : '' }}" href="/dashboard/profiles">
          <span data-feather="folder"></span>
          Profil
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/ideal_profile*') ? 'active' : '' }}" href="/dashboard/ideal_profile">
          <span data-feather="folder"></span>
          Profil Ideal
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="users"></span>
          Calon Retailer
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/calculation*') ? 'active' : '' }}" href="/dashboard/calculation">
          <span data-feather="bar-chart-2"></span>
          Hasil Perhitungan
        </a>
      </li>
      <li class="nav-item mt-5 m-2">
        <form action="/logout" method="post">
          @csrf
          <button class="btn btn-outline-success w-100 border border-success rounded-pill logout">Logout</button>
        </form>
      </li>
    </ul>
  </div>
</nav>