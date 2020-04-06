@extends('layouts.admin.app')
@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tanggapan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('petugas.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Tanggapan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hasil pencarian tanggapan</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Laporan Tanggapan</h4>
                            <form action="{{ route('petugas.pengaduan.search') }}" method="GET">
                                @csrf
                                <div class="card-header-form">
                                    <div class="input-group">
                                        <input type="text" placeholder="Search Lesson" class="form-control"
                                            name="judul">
                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                        <div class="input-group-btn">
                                            <input type="submit" class="btn btn-primary" value="Search"><i
                                                class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nama Petugas</th>
                                        <th>Tanggapan</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($tanggapans as $tanggapan)
                                    <tr>
                                        <td class="font-weight-600">{{ $tanggapan->nama_petugas }}</td>
                                        <td>
                                            {!! substr($tanggapan->tanggapan, 0,100) !!}...
                                        </td>
                                        <td>
                                            @if ($tanggapan->status == '0')
                                            <div class="badge badge-danger">Belum di Verifikasi</div>
                                            @elseif ($tanggapan->status == 'proses')
                                            <div class="badge badge-warning">Dalam Proses</div>
                                            @else
                                            <div class="badge badge-success">Selesai</div>
                                            @endif
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($tanggapan->tgl_tanggapan)->format('d M Y') }}</td>
                                        <td><a href="{{ route('petugas.tanggapan.detail', $tanggapan->id_tanggapan) }}"
                                                class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            {{ $tanggapans->onEachSide(1)->links("layouts.admin.paginate") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
