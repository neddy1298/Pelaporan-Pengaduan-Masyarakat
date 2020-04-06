@extends('layouts.admin.app')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-2">
            {{-- Pengaduan --}}
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2 card-danger">
                    <div class="card-stats">
                        <div class="card-stats-title">
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">
                                    {{ $pengaduans->where('tgl_pengaduan', today())->where('status','0')->count() }}
                                </div>
                                <div class="card-stats-item-label">Pengaduan Baru</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $pengaduans->where('status', '0')->count() }}
                                </div>
                                <div class="card-stats-item-label">Belum Verifikasi</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">
                                    {{ $pengaduans->where('status', 'proses')->count() }}</div>
                                <div class="card-stats-item-label">Belum Ditanggapi</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-danger bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pengaduan</h4>
                        </div>
                        <div class="card-body">
                            {{ $pengaduans->count() }}
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Pengaduan --}}


            {{-- Tanggapan --}}
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2 card-warning">
                    <div class="card-stats">
                        <div class="card-stats-title">
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">
                                    {{ $pengaduans->where('created_at', today())->count() }}</div>
                                <div class="card-stats-item-label">Tanggapan Baru</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">
                                    {{ $pengaduans->where('status','proses')->count() }}
                                </div>
                                <div class="card-stats-item-label">Proses</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">
                                    {{ $pengaduans->where('status', 'selesai')->count() }}</div>
                                <div class="card-stats-item-label">Ditanggapi</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-warning bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Tanggapan</h4>
                        </div>
                        <div class="card-body">
                            {{ $tanggapans->count() }}
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Tanggapan --}}

            {{-- User --}}
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2 card-success">
                    <div class="card-stats">
                        <div class="card-stats-title">
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">
                                    {{ $users->count() }}</div>
                                <div class="card-stats-item-label">Total Users</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">
                                    {{ $pengaduans->where('status','proses')->count() }}
                                </div>
                                <div class="card-stats-item-label">Proses</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">
                                    {{ $pengaduans->where('status', 'selesai')->count() }}</div>
                                <div class="card-stats-item-label">Ditanggapi</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-success bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Active Users</h4>
                        </div>
                        <div class="card-body">
                            {{ $users->count() }}
                        </div>
                    </div>
                </div>
            </div>
            {{-- End User --}}
        </div>

        <div class="row">

            {{-- Belum Verifikasi & Proses  --}}

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Pengaduan Belum di Verifikasi</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($tanggapans->where('status', '0')->take('7') as $tanggapan)
                                <tr>
                                    <td><a href="#">{{ $tanggapan->nik }}</a></td>
                                    <td class="font-weight-600">{{ $tanggapan->nama }}</td>
                                    <td>
                                        <div class="badge badge-danger">Menunggu Verifikasi</div>
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($tanggapan->tgl_pengaduan)->format('d M Y') }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Belum Verifikasi & Proses --}}

            {{-- Pengaduan Terbaru --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Pengaduan Terbaru</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($pengaduans->take(4) as $pengaduan)
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50"
                                    src="{{ asset('template') }}/img/avatar/avatar-1.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">
                                        {{ Carbon\Carbon::parse($pengaduan->tgl_pengaduan)->format('d F Y') }}</div>
                                    <div class="media-title">{{ $pengaduan->nama }}</div>
                                    <span class="text-small text-muted">{!! substr($pengaduan->isi_laporan, 0,150)
                                        !!}...</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="text-center pt-1 pb-1">
                            <a href="#" class="btn btn-primary btn-lg btn-round">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Pengaduan Terbaru --}}

            {{-- Pengaduan Selesai di Tanggapai --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Pengaduan Selesai di Tanggapai</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Ditanggapi Oleh</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($tanggapans->take('7') as $tanggapan)
                                <tr>
                                    <td><a href="#">{{ $tanggapan->nik }}</a></td>
                                    <td class="font-weight-600">{{ $tanggapan->nama }}</td>
                                    <td>
                                        <div class="badge badge-success">Selesai</div>
                                    </td>
                                    <td>
                                        {{ $tanggapan->nama_petugas }}
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($tanggapan->tgl_pengaduan)->format('d M Y') }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Pengaduan Selesai di Tanggapai --}}

            {{-- Pengaduan Dalam Proses --}}
            <div class="col-md-4">
                <div class="card card-hero">
                    <div class="hero text-white hero-bg-image hero-bg-parallax"
                        data-background="{{ asset('template') }}/img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg">
                        <div class="hero-inner">
                            <h2>{{ $pengaduans->where('status', 'proses')->count() }}</h2>
                            <p class="lead">Pengaduan dalam peroses</p>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tickets-list">
                            @foreach ($pengaduans->where('status', 'proses')->take(4) as $pengaduan)
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>{!! substr($pengaduan->isi_laporan, 0,25) !!}...</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>{{ $pengaduan->nama }}</div>
                                    <div class="bullet"></div>
                                    <div>{{ $pengaduan->tgl_pengaduan->format('d M, Y') }}</div>
                                </div>
                            </a>
                            @endforeach
                            <a href="features-tickets.html" class="ticket-item ticket-more">
                                View All <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Pengaduan Dalam Proses --}}

        </div>
    </section>
</div>
@endsection
