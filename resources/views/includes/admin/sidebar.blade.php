<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">APOTIK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin2') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('obat.index') }}">
          <i class="fas fa-fw fa-notes-medical"></i>
          <span>Data Obat</span></a>
      </li>
      <!-- Nav Item - obat masuk -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('obat_masuk.index') }}">
          <i class="fas fa-fw fa-notes-medical"></i>
          <span>Data Obat masuk</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('pasien.index') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Pasien</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('dokter.index') }}">
          <i class="fas fa-fw fa-user-md"></i>
          <span>Data Dokter</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ route('user') }}">
          <i class="fas fa-fw fa-user"></i>
          <span>Data User</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('resep.index') }}">
          <i class="fas fa-fw fa-receipt"></i>
          <span>Resep</span></a>
      </li>

      
      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="{{ route('kasir.index') }}">
          <i class="fas fa-fw fa-cash-register"></i>
          <span>Kasir</span></a>
      </li>
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>