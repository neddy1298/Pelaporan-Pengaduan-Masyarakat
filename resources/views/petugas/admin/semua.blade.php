@extends('layouts.admin.app', ['page' => 'Admin', 'subpage' => 'Semua'])
@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admins</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('petugas.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Admins</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Semua admin</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Admins</h4>
                            <div class="card-header-form">
                                <form action="{{ route('petugas.admin.search') }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                        <div class="input-group-btn">
                                            <input type="submit" class="btn btn-primary" value="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nama Petugas</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <th class="text-center">Level</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($admins as $petugas)
                                    <tr>
                                        <td>{{ $petugas->nama_petugas }}</td>
                                        <td>{{ $petugas->email }}</td>
                                        <td>{{ $petugas->telp }}
                                        </td>
                                        <td class="text-center">
                                            @if ($petugas->level == 'admin')
                                            <div class="badge badge-info">Super Admin</div>
                                            @else
                                            <div class="badge badge-success">Admin</div>
                                            @endif
                                        </td>
                                        <td><a href="{{ route('petugas.admin.detail', $petugas->id_petugas ) }}"
                                                class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            {{ $admins->onEachSide(1)->links("layouts.admin.paginate") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
