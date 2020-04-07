@extends('layouts.admin.app', ['page' => 'Users', 'subpage' => 'Detail'])
@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('petugas.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail user {{ $user->nik }}</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>User</h4>
                            <div class="card-header-form">
                                <div class="buttons">
                                    <form action="{{ route('petugas.pengaduan.search') }}" method="POST">
                                        @csrf
                                        <input type="text" name="search" value="{{ $user->nama }}" hidden>
                                        <input type="submit" class="btn btn-warning" value="Pengaduan User">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="card author-box card-primary">
                                            <div class="card-body">
                                                <ul
                                                    class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                                                    <li class="media">
                                                        <div class="media-body">
                                                            <div class="media-title">{{ $user->nama }}</div>
                                                            <div class="text-job text-muted">{{ $user->email }}</div>
                                                        </div>
                                                        <div class="media-items">
                                                            <div class="media-item col-12">
                                                                <div class="media-value">
                                                                    {{ $pengaduans->where('status', '0')->count() }}
                                                                </div>
                                                                <div class="media-label">Belum Konfirmasi</div>
                                                            </div>
                                                            <div class="media-item">
                                                                <div class="media-value">
                                                                    {{ $pengaduans->where('status', 'proses')->count() }}
                                                                </div>
                                                                <div class="media-label">Proses Penanggapan</div>
                                                            </div>
                                                            <div class="media-item">
                                                                <div class="media-value">
                                                                    {{ $pengaduans->where('status', 'selesai')->count() }}
                                                                </div>
                                                                <div class="media-label">Selesai di Tanggapi </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-md-8">
                                        <div class="media mt-3">
                                            <div class="pl-5 media-body">
                                                <h5 class="mb-3">{{ $pengaduans->count() }} Pengaduan</h5>
                                                <hr>
                                                @foreach ($pengaduans as $pengaduan)
                                                <div class="row">
                                                    @if ($pengaduan->status == '0')
                                                    <h4 class="badge badge-danger">Belum di Konfirmasi</h4>
                                                    @elseif ($pengaduan->status == 'proses')
                                                    <h4 class="badge badge-warning">Proses Penanggapan</h4>
                                                    @elseif ($pengaduan->status == 'selesai')
                                                    <h4 class="badge badge-success">Selesai di Tanggapi</h4>
                                                    @endif
                                                </div>
                                                <h6 class="text-right">{{ $pengaduan->tgl_pengaduan->format('d F, Y') }}
                                                </h6>
                                                <h6 class="mt-0">{{ $pengaduan->nama }}</h6>

                                                <p class="mb-0">{{ $pengaduan->isi_laporan }}</p>
                                                <div class="buttons text-right">

                                                    <a class="btn btn-primary"
                                                        href="{{ route('petugas.pengaduan.detail',$pengaduan->id_pengaduan )}}">Detail</a>
                                                </div>
                                                <hr>
                                                @endforeach
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</div>
@endsection
