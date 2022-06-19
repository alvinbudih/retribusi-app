<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
            <i class="nav-icon oi oi-dashboard"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">Menu Master</li>
        @can("admin")
        <li class="nav-item">
          <a href="{{ route("user.index") }}" class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-people"></i>
            <p>User</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route("akun.index") }}" class="nav-link {{ Request::is('dashboard/akun*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-clipboard"></i>
            <p>Akun</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route("pemilik.index") }}" class="nav-link {{ Request::is('dashboard/pemilik*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-list"></i>
            <p>Pemilik</p>
          </a>
        </li>
        @endcan
        <li class="nav-item">
          <a href="{{ route("biaya.index") }}" class="nav-link {{ Request::is('dashboard/biaya*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-dollar"></i>
            <p>Biaya</p>
          </a>
        </li>
        <li class="nav-header">Menu Transaksi</li>
        <li class="nav-item has-treeview {{ Request::is('dashboard/kaskeluar*') || Request::is('dashboard/kasmasuk*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('dashboard/kaskeluar*') || Request::is('dashboard/kasmasuk*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-credit-card"></i>
            <p>
              Transaksi Kas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link {{ Request::is('dashboard/kaskeluar*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kas Keluar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link {{ Request::is('dashboard/kasmasuk*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kas Masuk</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon oi oi-book"></i>
            <p>
              Buku Besar
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>