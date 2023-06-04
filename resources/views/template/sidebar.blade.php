@if (Auth::user()->role == 'admin')
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin/dashboard') }}">
            <div class="sidebar-brand-text mx-3">SIPEKA</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin/dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Pendaftaran
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin/pendaftaran') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Pendaftaran</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Penjadwalan
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin/penjadwalan') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Jadwal Pernikahan</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    </ul>
@endif

@if (Auth::user()->role == 'user')
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-text mx-3">SIPEKA</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Pendaftaran
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('pendaftaran') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Pendaftaran</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Penjadwalan
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('penjadwalan') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Jadwal Pernikahan</span>
            </a>
        </li>


    </ul>
@endif
