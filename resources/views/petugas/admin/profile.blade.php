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
                            <img alt="image" src="../assets/img/avatar/avatar-1.png"
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
                            <form method="POST" class="needs-validation" novalidate=""
                                action="{{ petugas.admin.update }}">
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama_petugas"
                                                value="{{ Auth::user()->nama_petugas }}" required="" />
                                            <div class="invalid-feedback">
                                                Please fill in the name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-7 col-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{ Auth::user()->email }}"
                                                name="email" required="" />
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label>Phone</label>
                                            <input type="tel" class="form-control" name="telp"
                                                value="{{ Auth::user()->telp }}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-6">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username"
                                                value="{{ Auth::user()->username }}" />
                                            <div class="invalid-feedback">
                                                Please fill in the username
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-6">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="password"
                                                value="{{ Auth::user()->nama_petugas }}" />
                                            <div class="invalid-feedback">
                                                Please fill in the password
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="submit" class="btn btn-primary" value="Save Changes">
                                </div>
                            </form>
                            <form method="POST" class="needs-validation" novalidate=""
                                action="{{ route('petugas.admin.update2') }}">
                                <div class="card-header">
                                    <h4>Dengerous Area</h4>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-6">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username"
                                            value="{{ Auth::user()->username }}" />
                                        <div class="invalid-feedback">
                                            Please fill in the username
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-6">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password"
                                            value="{{ Auth::user()->nama_petugas }}" />
                                        <div class="invalid-feedback">
                                            Please fill in the password
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer text-right">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="font-weight-bold mb-2">Follow Ujang On</div>
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
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form method="post" class="needs-validation" novalidate="">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" value="Ujang" required="" />
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="Maman" required="" />
                                    <div class="invalid-feedback">
                                        Please fill in the last name
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="ujang@maman.com" required="" />
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>Phone</label>
                                    <input type="tel" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Bio</label>
                                    <textarea class="form-control summernote-simple">
Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-0 col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input"
                                            id="newsletter" />
                                        <label class="custom-control-label" for="newsletter">Subscribe
                                            to newsletter</label>
                                        <div class="text-muted form-text">
                                            You will get new information about products,
                                            offers and promotions
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</section>
</div>
@endsection
