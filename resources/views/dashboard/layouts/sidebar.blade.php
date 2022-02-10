<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
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
          Kriterira
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/profiles*') ? 'active' : '' }}" href="#">
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
        <a class="nav-link" href="#">
          <span data-feather="bar-chart-2"></span>
          Hasil Perhitungan
        </a>
      </li>
      <li class="nav-item">
        <form action="" method="">
          <a class="nav-link" type="submit"><span data-feather="log-out"></span>Logout</a>
        </form>
      </li>
    </ul>
  </div>
</nav>