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
    {{-- sidbar user panel (optionsa) --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{-- Start: Dashboard --}}
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
            <i class="nav-icon oi oi-dashboard"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        {{-- End: Dashboard --}}
        {{-- Start: Menu Master --}}
        <li class="nav-header">Menu Master</li>
        @can("admin")
        <li class="nav-item">
          <a href="{{ route("user.index") }}" class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-people"></i>
            <p>User</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route("biaya.index") }}" class="nav-link {{ Request::is('dashboard/biaya*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-dollar"></i>
            <p>Biaya</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route("status.index") }}" class="nav-link {{ Request::is('dashboard/status*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-paperclip"></i>
            <p>Status Uji</p>
          </a>
        </li>
        <li class="nav-item has-treeview {{ Request::is('dashboard/menu-kendaraan*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('dashboard/menu-kendaraan*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-credit-card"></i>
            <p>
              Menu Kendaraan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pemilik.index') }}" class="nav-link {{ Request::is('dashboard/menu-kendaraan/pemilik*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pemilik Kendaraan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('merk.index') }}" class="nav-link {{ Request::is('dashboard/menu-kendaraan/merk*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Merk Kendaraan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tipe.index') }}" class="nav-link {{ Request::is('dashboard/menu-kendaraan/tipe*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tipe Kendaraan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('jenis.index') }}" class="nav-link {{ Request::is('dashboard/menu-kendaraan/jenis*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Jenis Kendaraan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kendaraan.index') }}" class="nav-link {{ Request::is('dashboard/menu-kendaraan/kendaraan*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kendaraan</p>
              </a>
            </li>
          </ul>
        </li>
        {{-- End: Menu Kendaraan --}}
        @endcan
        <li class="nav-header">Menu Transaksi</li>
        <li class="nav-item has-treeview {{ Request::is('dashboard/pendaftaran*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('dashboard/pendaftaran*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-credit-card"></i>
            <p>
              Menu Pendaftaran
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @can("pelayanan")
              <li class="nav-item">
                <a href="{{ route('form.pendaftaran') }}" class="nav-link {{ Request::is('dashboard/pendaftaran/form-pendaftaran') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendaftaran</p>
                </a>
              </li>
            @endcan
            <li class="nav-item">
              <a href="{{ route('rekap.pendaftaran') }}" class="nav-link {{ Request::is('dashboard/pendaftaran/rekapan-pendaftaran') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Rekapan Pendaftaran</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview {{ Request::is('dashboard/pembayaran*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('dashboard/pembayaran*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-credit-card"></i>
            <p>
              Menu Pembayaran
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @can('kasir')
              <li class="nav-item">
                <a href="{{ route('proses.pembayaran') }}" class="nav-link {{ Request::is('dashboard/pembayaran/proses*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembayaran</p>
                </a>
              </li>
            @endcan
            <li class="nav-item">
              <a href="{{ route('rekap.pembayaran') }}" class="nav-link {{ Request::is('dashboard/pembayaran/rekapan*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Rekapan Pembayaran</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview {{ Request::is('dashboard/laporan*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('dashboard/laporan*') ? 'active' : '' }}">
            <i class="nav-icon oi oi-book"></i>
            <p>
              Menu Laporan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('get.jurnal') }}" class="nav-link {{ Request::is('dashboard/laporan/jurnal*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Jurnal</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('get.pendapatan') }}" class="nav-link {{ Request::is('dashboard/laporan/pendapatan*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pendapatan</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>