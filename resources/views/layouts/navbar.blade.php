<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Welcome, {{ auth()->user()->name }}</a>
      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
        <li>
          <a href="#" class="dropdown-item">
            <i class="nav-icon oi oi-person"></i>
            Profile
          </a>
        </li>
        
        <li class="dropdown-divider"></li>
        
        <!-- Level two dropdown-->
        <li>
          <a href="{{ route('logout') }}" onclick="return confirm('Yakin ingin keluar?')" class="dropdown-item">
            <i class="nav-icon oi oi-account-logout"></i>
            Logout
          </a>
        </li>
        <!-- End Level two -->
      </ul>
    </li>
  </ul>
</nav>