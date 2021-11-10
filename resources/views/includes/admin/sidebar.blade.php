  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  {{ (Request()->is('Secret')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ (Request()->is('Secret/Identities*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('Identities.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tambah Pemesanan</span></a>
    </li>



</ul>
<!-- End of Sidebar -->