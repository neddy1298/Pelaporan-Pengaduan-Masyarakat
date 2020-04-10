@extends('layouts.admin.app', ['page' => 'Admins', 'subpage' => 'Profile'])

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('petugas.dashboard') }}">Dashboard</a>
                </div>
                <div class="#">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ Auth::user()->nama_petugas }}</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ asset('template') }}/img/avatar/avatar-1.png"
                                class="rounded-circle profile-widget-picture" />
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Posts</div>
                                    <div class="profile-widget-item-value">187</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Followers</div>
                                    <div class="profile-widget-item-value">6,8K</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Following</div>
                                    <div class="profile-widget-item-value">2,1K</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">
                                {{ Auth::user()->nama_petugas }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div>
                                    {{ Auth::user()->level }}
                                </div>
                            </div>
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <button class="btn btn-primary" onclick="disable()">Disable</button>
                            <button class="btn btn-primary" onclick="enable()">Enable</button>
                            <form method="POST" class="needs-validation"
                                action="{{ route('petugas.update', Auth::user()->id_petugas ) }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama_petugas"
                                                value="{{ Auth::user()->nama_petugas }}" id="form" disabled required />
                                            <div class="invalid-feedback">
                                                Please fill in the name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-7 col-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{ Auth::user()->email }}"
                                                name="email" id="form2" disabled required />
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label>Phone</label>
                                            <input type="tel" class="form-control" name="telp"
                                                value="{{ Auth::user()->telp }}" id="form3" disabled required />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="submit" class="btn btn-primary" value="Save Changes" id="form4"
                                        disabled required>
                                </div>
                            </form>

                            <div class="card-header">
                                <h4>Dengerous Area</h4>
                            </div>
                            <button class="btn btn-primary" onclick="disable1()">Disable</button>
                            <button class="btn btn-primary" onclick="enable1()">Enable</button>
                            <form method="POST" class="needs-validation" novalidate=""
                                action="{{ route('petugas.update', Auth::user()->id_petugas ) }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-6">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username"
                                                value="{{ Auth::user()->username }}" id="form5" disabled required
                                                required>
                                            <div class="invalid-feedback">
                                                Please fill in the username
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-6">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" value=""
                                                id="form6" disabled required />
                                            <div class="invalid-feedback">
                                                Please fill in the password
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <input type="submit" class="btn btn-primary" value="Save Changes" id="form7"
                                                disabled required required>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Follow {{ Auth::user()->nama_petugas }} On</div>
                            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-github mr-1">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function disable() {
    document.getElementById("form").disabled = true;
    document.getElementById("form2").disabled = true;
    document.getElementById("form3").disabled = true;
    document.getElementById("form4").disabled = true;
    }
    function enable() {
    document.getElementById("form").disabled = false;
    document.getElementById("form2").disabled = false;
    document.getElementById("form3").disabled = false;
    document.getElementById("form4").disabled = false;
    }
    function disable1() {
    document.getElementById("form5").disabled = true;
    document.getElementById("form6").disabled = true;
    document.getElementById("form7").disabled = true;
    }
    function enable1() {
    document.getElementById("form5").disabled = false;
    document.getElementById("form6").disabled = false;
    document.getElementById("form7").disabled = false;
    }
</script>
@endsection
