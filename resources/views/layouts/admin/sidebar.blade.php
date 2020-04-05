<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('petugas.dashboard') }}">Control Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('petugas.dashboard') }}">PPM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
                <a href="{{ route('petugas.dashboard') }}" class="nav-link "><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="ion ion-ios-download-outline"></i>
                    <span>Pengaduan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-top-navigation.html">Semua Pengaduan</a></li>
                    <li><a class="nav-link" href="">Belum Verifikasi</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Dalam Proses</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Pengaduan Selesai</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="ion ion-ios-download-outline"></i>
                    <span>Tanggapan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-top-navigation.html">Semua Tanggapan</a></li>
                    <li><a class="nav-link" href="">Proses Penanggapan</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Selesai Ditanggapi</a></li>
                </ul>
            </li>
            <li class="menu-header">Users</li>
            <li>
                <a href="{{ route('petugas.dashboard') }}" class="nav-link "><i
                        class="ion ion-ios-body"></i><span>Users</span></a>
            </li>
            <li>
                <a href="{{ route('petugas.dashboard') }}" class="nav-link "><i
                        class="ion ion-ios-locked"></i><span>Admin</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
