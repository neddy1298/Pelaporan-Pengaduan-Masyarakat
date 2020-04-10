@extends('layouts.front.app', ['page' => 'User'])

@section('content')

<!-- Slider Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-80">
                    <h2>User Profile​</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End-->

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">
        <div class="row mb-80">
            <div class="col-12">
                <h2 class="contact-title">Edit Profile</h2>
                <h6 class="mb-80">Change information about yourself on this page. </h6>
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form"
                    action="{{ route('masyarakat.profile.update', Auth::user()->nik ) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input class="form-control valid" name="nama" id="nama" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                    placeholder="Enter your name" value="{{ Auth::user()->nama }}" required>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input class="form-control valid" name="email" id="email" type="email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                    placeholder="Email" value="{{ Auth::user()->email }}" required>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="">No. Telp</label>
                                <input class="form-control valid" name="telp" id="telp" type="text"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter your phone number'"
                                    placeholder="Enter your phone number" value="{{ Auth::user()->telp }}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">NIK <small>(hubungi petugas untuk merubah)</small></label>
                                <input class="form-control" name="nik" id="nik" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your NIK'"
                                    placeholder="Enter your NIK" value="{{ Auth::user()->nik }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 text-right">
                        <input type="submit" class="btn-danger boxed-btn" value="Update">
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Buttonwood, California.</h3>
                        <p>Rosemead, CA 91770</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>+1 253 565 2365</h3>
                        <p>Mon to Fri 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>support@colorlib.com</h3>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Danger Area</h2>
                <h6 class="mb-80">Change information about yourself on this page. </h6>
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form"
                    action="{{ route('masyarakat.profile.update', Auth::user()->nik ) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input class="form-control valid" name="username" id="username" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Username'"
                                    placeholder="Enter your Username" value="{{ Auth::user()->username }}" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input class="form-control valid" name="password" id="password" type="password"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your password'"
                                    placeholder="Enter your password" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" class="btn-danger boxed-btn" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection
