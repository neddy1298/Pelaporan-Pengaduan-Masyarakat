@extends('layouts.admin.app')
@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengaduan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('petugas.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Pengaduan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Semua laporan users</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Laporan Pengaduan</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                        <a class="ml-2 btn btn-primary" href="" data-toggle="tooltip"
                                            data-placement="bottom" title="Buat pengaduan baru">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Isi Laporan</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($pengaduans as $pengaduan)
                                    <tr>
                                        <td><a href="#">{{ $pengaduan->nik }}</a></td>
                                        <td class="font-weight-600">{{ $pengaduan->nama }}</td>
                                        <td>Foto</td>
                                        <td>
                                            {!! substr($pengaduan->isi_laporan, 0,30) !!}...
                                        </td>
                                        <td>
                                            @if ($pengaduan->status == '0')
                                            <div class="badge badge-danger">Belum di Verifikasi</div>
                                            @elseif ($pengaduan->status == 'proses')
                                            <div class="badge badge-warning">Dalam Proses</div>
                                            @else
                                            <div class="badge badge-success">Selesai</div>
                                            @endif
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($pengaduan->tgl_pengaduan)->format('d M Y') }}</td>
                                        <td><a href="{{ route('petugas.pengaduan.detail', $pengaduan->id_pengaduan) }}"
                                                class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            {{ $pengaduans->onEachSide(1)->links("layouts.admin.paginate") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
