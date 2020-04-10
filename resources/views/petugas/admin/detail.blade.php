@extends('layouts.admin.app', ['page' => 'Admin', 'subpage' => 'Detail'])
@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admins</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('petugas.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Admin</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail admin {{ $admin->id_petugas }}</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Admin</h4>
                            <div class="card-header-form">
                                <div class="buttons">
                                    <form action="{{ route('petugas.admin.search') }}" method="POST">
                                        @csrf
                                        <input type="text" name="search" value="{{ $admin->nama_petugas }}" hidden>
                                        <input type="submit" class="btn btn-warning" value="Pengaduan Admin">
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
                                                            <div class="media-title">{{ $admin->nama_petugas }}</div>
                                                            <div class="text-job text-muted">{{ $admin->email }}</div>
                                                        </div>
                                                        <div class="media-items">
                                                            <div class="media-item col-12">
                                                                <div class="media-value">
                                                                    {{ $admin->level }}
                                                                </div>
                                                                <div class="media-label">Level</div>
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
                                                <h5 class="mb-3">{{ $tanggapans->count() }} Tanggapan</h5>
                                                <hr>
                                                @foreach ($tanggapans as $tanggapan)
                                                <h6 class="text-right">{{ $tanggapan->tgl_tanggapan->format('d F, Y') }}
                                                </h6>
                                                <h6 class="mt-0">{{ $tanggapan->nama }}</h6>

                                                <p class="mb-0">{{ $tanggapan->tanggapan }}</p>
                                                <div class="buttons text-right">

                                                    <a class="btn btn-primary"
                                                        href="{{ route('petugas.tanggapan.detail',$tanggapan->id_tanggapan )}}">Detail</a>
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
