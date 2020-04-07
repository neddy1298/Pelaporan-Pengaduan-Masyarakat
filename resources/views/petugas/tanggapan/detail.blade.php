@extends('layouts.admin.app', ['page' => 'Tanggapan', 'subpage' => 'Detail'])
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
            <h2 class="section-title">Detail Tanggapan di Pengaduan {{ $pengaduan->nik }}</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tanggapan {{ $tanggapan->nama_petugas }}</h4>
                            <div class="card-header-form">
                                <div class="buttons">
                                    <a href="{{ route('petugas.pengaduan.detail', $tanggapan->id_pengaduan) }}"
                                        class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>
                                        Detail Pengaduan</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            @if ($pengaduan->status == '0')
                            <h4 class="badge badge-danger">Belum di Konfirmasi</h4>
                            @elseif ($pengaduan->status == 'proses')
                            <h4 class="badge badge-warning">Proses Penanggapan</h4>
                            @elseif ($pengaduan->status == 'selesai')
                            <h4 class="badge badge-success">Selesai di Tanggapi</h4>
                            @endif
                            <div class="card-header-form">
                                <h5 class="text-right">{{ $tanggapan->tgl_tanggapan->format('d F, Y') }}</h5>
                            </div>


                            <div class="media">
                                <div class="media-body col-md-12 col-sm-12">
                                    <h5 class="mt-0">{{ $tanggapan->nama_petugas }}</h5>
                                    <p>{{ $tanggapan->tanggapan }}</p>
                                    <hr>
                                    <div class="media mt-3">
                                        <div class="pl-5 media-body">
                                            <h5 class="mb-3">Pengaduan</h5>


                                            <h6 class="text-right">{{ $pengaduan->tgl_pengaduan->format('d F, Y') }}
                                                <h6 class="mt-0">{{ $pengaduan->nama }}</h6>
                                            </h6>
                                            <p class="mb-0">{{ $pengaduan->isi_laporan }}</p>
                                            <div class="gallery col-md-2 mt-2">
                                                <div class="gallery-item"
                                                    data-image="{{ asset('template') }}/img/unsplash/andre-benz-1214056-unsplash.jpg"
                                                    data-title="Image 8">
                                                </div>
                                            </div>
                                            <hr>
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
