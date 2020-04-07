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
                <a href="{{ route('petugas.dashboard') }}" class="nav-link ">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="nav-item dropdown {{ ( $page == 'Pengaduan') ? 'active' : '' }}">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="ion ion-ios-download-outline"></i>
                    <span>Pengaduan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ ( $subpage == 'Semua') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('petugas.pengaduan') }}">Semua Pengaduan</a></li>
                    <li class="{{ ( $subpage == '0') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('petugas.pengaduan.custome', '0') }}">Belum Verifikasi</a>
                    </li>
                    <li class="{{ ( $subpage == 'proses') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('petugas.pengaduan.custome', 'proses') }}">Dalam Proses</a>
                    </li>
                    <li class="{{ ( $subpage == 'selesai') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('petugas.pengaduan.custome', 'selesai') }}">Pengaduan
                            Selesai</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ ( $page == 'Tanggapan') ? 'active' : '' }}">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="ion ion-ios-download-outline"></i>
                    <span>Tanggapan</span></a>
                <ul class="dropdown-menu">
                    <li class=" {{ ( $subpage == 'Semua') ? 'active' : '' }} "><a class="nav-link"
                            href="{{ route('petugas.tanggapan') }}">Semua Tanggapan</a></li>
                    <li class=" {{ ( $subpage == 'proses') ? 'active' : '' }} "><a class="nav-link"
                            href="{{ route('petugas.tanggapan.custome', 'proses') }}">Proses
                            Penanggapan</a></li>
                    <li class=" {{ ( $subpage == 'selesai') ? 'active' : '' }} "><a class="nav-link"
                            href="{{ route('petugas.tanggapan.custome', 'selesai') }}">Selesai
                            Ditanggapi</a></li>
                </ul>
            </li>
            <li class="menu-header">Users</li>
            <li>
                <a href="{{ route('petugas.user') }}" class="nav-link "><i
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
