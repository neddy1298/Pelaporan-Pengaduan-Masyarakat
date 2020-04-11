@extends('layouts.admin.app', ['page' => 'Pangaduan', 'subpage' => 'Detail'])
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
            <h2 class="section-title">Detail Pengaduan {{ $pengaduan->nik }}</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Laporan Pengaduan</h4>
                            <div class="card-header-form">
                                <a class="btn btn-primary ml-3"
                                    href="{{ route('petugas.report.satu', $pengaduan->id_pengaduan) }}"
                                    target="_blank">Export
                                    PDF</a>
                                @if ($pengaduan->status == '0')
                                <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#konfirmasi">Konfirmasi</button>

                                @elseif ($pengaduan->status == 'proses')
                                <button class="btn btn-success" data-toggle="modal" data-target="#selesai">Selesaikan
                                    Pengaduan</button>
                                @endif
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
                                <h5 class="text-right">{{ $pengaduan->tgl_pengaduan->format('d F, Y') }}</h5>
                            </div>


                            <div class="media">
                                <div class="media-body col-md-12 col-sm-12">
                                    <h5 class="mt-0">{{ $pengaduan->nama }}</h5>
                                    <p>{{ $pengaduan->isi_laporan }}</p>
                                    <div class="gallery col-md-2">
                                        <div class="gallery-item"
                                            data-image="{{ asset('template') }}/img/unsplash/andre-benz-1214056-unsplash.jpg"
                                            data-title="Image 8">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="media mt-3">
                                        <div class="pl-5 media-body">
                                            <h5 class="mb-3">{{ $tanggapans->count() }} Tanggapan</h5>
                                            @foreach ($tanggapans as $tanggapan)


                                            <h6 class="text-right">{{ $tanggapan->tgl_tanggapan->format('d F, Y') }}
                                            </h6>
                                            <h6 class="mt-0">{{ $tanggapan->nama_petugas }}</h6>

                                            <p class="mb-0">{{ $tanggapan->tanggapan }}</p>
                                            <hr>
                                            @endforeach
                                            <hr>
                                            <form class="needs-validation" novalidate="" method="POST"
                                                action="{{ route('petugas.tanggapan.create') }}">
                                                @csrf
                                                <div class="form-group mb-0">
                                                    <label>Beri tanggapan</label>
                                                    <input type="text" name="tgl_tanggapan"
                                                        value="{{now()->format('Y-m-d')}}" hidden>
                                                    <input type="text" name="id_pengaduan"
                                                        value="{{ $pengaduan->id_pengaduan }}" hidden>
                                                    <input type="text" name="id_petugas"
                                                        value="{{ Auth::user()->id_petugas }}" hidden>
                                                    <textarea class="form-control" required=""
                                                        name="tanggapan"></textarea>
                                                    <div class="invalid-feedback">
                                                        Tanggapan tidak boleh kosong
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <button class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    {{-- Selesai --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="selesai">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Ingin menyelesaikan pengaduan?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{ route('petugas.pengaduan.update', $pengaduan->id_pengaduan) }}" method="post">
                        @csrf
                        <input type="text" name="status" value="selesai" hidden>
                        <input type="submit" class="btn btn-primary" value="Selesai">
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Selesai --}}

    {{-- Konfirmasi --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Ingin mengkonfirmasi pengaduan?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{ route('petugas.pengaduan.update', $pengaduan->id_pengaduan) }}" method="post">
                        @csrf
                        <input type="text" name="status" value="proses" hidden>
                        <input type="submit" class="btn btn-warning" value="konfirmasi">
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Konfirmasi --}}

</div>
@endsection
