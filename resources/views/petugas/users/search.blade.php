@extends('layouts.admin.app', ['page' => 'Users', 'subpage' => 'Semua'])
@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('petugas.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Users</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hasil pencarian dari {{ $search }}</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $users->count() }} Users</h4>
                            <div class="card-header-form">
                                <form action="{{ route('petugas.user.search') }}" method="POST">
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
                                        <th>Nama Users</th>
                                        <th>NIK</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <th class="text-center">Status</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->nama }}</td>
                                        <td><a href="#">{{ $user->nik }}</a></td>
                                        <td class="font-weight-600">{{ $user->email }}</td>
                                        <td>{{ $user->telp }}
                                        </td>
                                        <td class="text-center">
                                            @if ($user->status == '0')
                                            <div class="badge badge-danger">Offline</div>
                                            @else
                                            <div class="badge badge-success">Online</div>
                                            @endif
                                        </td>
                                        <td><a href="{{ route('petugas.user.detail', $user->id ) }}"
                                                class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            {{ $users->onEachSide(1)->links("layouts.admin.paginate") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
