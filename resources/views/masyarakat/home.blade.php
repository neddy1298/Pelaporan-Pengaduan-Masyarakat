@extends('layouts.front.app', ['page' => 'Home'])

@section('content')
<!-- Slider Area Start-->
<div class="slider-area ">
    <div class="slider-active">
        <div class="single-slider slider-height slider-padding sky-blue d-flex align-items-center">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-md-9 ">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInUp" data-delay=".6s">Layanan Aspirasi dan Pengaduan Online
                                Masyarakat
                            </h1>
                            <p data-animation="fadeInUp" data-delay=".8s">Sampaikan laporan Anda langsung kepada
                                instansi pemerintah berwenang
                                <h6 data-animation="fadeInRight" data-delay="1.0s">
                                    <a href="#tata-cara" class="text-info">Ketahi caranya!</a>
                                </h6>
                            </p>
                            <!-- Slider btn -->
                            <div class="slider-btns">
                                <!-- Hero-btn -->
                                @if (Auth::guest())
                                <a data-animation="fadeInLeft" data-delay="1.0s" class="btn card-btn1"
                                    href="{{ route('masyarakat.login') }}">Masuk</a>
                                @else
                                <a data-animation="fadeInLeft" data-delay="1.0s" href="#pengaduan"
                                    class="btn card-btn1">Tulis Laporan</a>
                                @endif
                                <!-- Video Btn -->
                                {{-- <a data-animation="fadeInRight" data-delay="1.0s"
                                        class="popup-video video-btn ani-btn"
                                        href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><i
                                            class="fas fa-play"></i></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero__img d-none d-lg-block f-right" data-animation="fadeInRight" data-delay="1s">
                            <img src="{{ asset('template') }}/img/undraw/undraw_posting_photo_v65l.png" alt=""
                                width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- slide 2 --}}
        <div class="single-slider slider-height slider-padding sky-blue d-flex align-items-center">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-md-9 ">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInUp" data-delay=".6s">Layanan Aspirasi dan Pengaduan Online
                                Masyarakat
                            </h1>
                            <p data-animation="fadeInUp" data-delay=".8s">Sampaikan laporan Anda langsung kepada
                                instansi pemerintah berwenang
                                <!-- Slider btn -->
                                <div class="slider-btns">
                                    <!-- Hero-btn -->
                                    @if (Auth::guest())
                                    <a data-animation="fadeInLeft" data-delay="1.0s" class="btn card-btn1"
                                        href="{{ route('masyarakat.login') }}">Masuk</a>
                                    @else
                                    <a data-animation="fadeInLeft" data-delay="1.0s" href="#pengaduan"
                                        class="btn card-btn1">Tulis Laporan</a>
                                    @endif
                                    <!-- Video Btn -->
                                    {{-- <a data-animation="fadeInRight" data-delay="1.0s"
                                    class="popup-video video-btn ani-btn"
                                    href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><i
                                        class="fas fa-play"></i></a> --}}
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero__img d-none d-lg-block f-right" data-animation="fadeInRight" data-delay="1s">
                            <img src="{{ asset('template') }}/img/undraw/undraw_social_distancing_2g0u.png" alt=""
                                width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End slide 2 --}}
    </div>
</div>
<!-- Slider Area End -->
<style>
    * {
        scroll-behavior: smooth;
    }
</style>
@auth
<!-- Best Pricing Start -->
<section class="best-pricing pricing-padding" data-background="{{ asset('front') }}/img/gallery/best_pricingbg.jpg"
    id="pengaduan">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="section-tittle mb-30 text-center">
                    <h2 class="text-white">Tulis Laporan Anda Disini
                        <p class="text-white">Laporkan keluhan atau
                            aspirasi anda dengan jelas dan lengkap
                        </p>
                        </h3>
                </div>
            </div>
            <hr>
        </div>
    </div>
</section>
<!-- Best Pricing End -->
<!-- Pricing Card Start -->
<div class="pricing-card-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="single-card text-center mb-30">
                    <div class="card-bottom">
                        <form action="{{ route('masyarakat.pengaduan.submit') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mt-10 mb-5">
                                <textarea class="single-textarea form-control w-100" name="isi_laporan" id="message"
                                    cols="30" rows="9" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"
                                    required>{{ old('isi_laporan') }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-left">
                                        <label class="btn card-btn1 radius e-large">
                                            <input type="file" name="foto" accept=".png, .jpg, .jpeg" id="check"
                                                onchange="validateFileType()" required />
                                            Upload Gambar
                                        </label>
                                        <style>
                                            input[type="file"] {
                                                display: none;
                                            }

                                            .custom-file-upload {
                                                display: inline-block;
                                                padding: 6px 12px;
                                                cursor: pointer;
                                            }
                                        </style>
                                        <script type="text/javascript">
                                            function validateFileType(){
                                                var fileName = document.getElementById("check").value;
                                                var idxDot = fileName.lastIndexOf(".") + 1;
                                                var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                                                if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
                                                    //TO DO
                                                }else{
                                                    document.getElementById("check").value = '';
                                                    alert("Pastikan format file benar!");
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right">
                                        <input type="submit" class="genric-btn danger-border radius e-large"
                                            value="LAPOR!">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pricing Card End -->
@endauth
<!-- Services Area Start -->
<section class="service-area sky-blue section-padding2" id="tata-cara">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="section-tittle text-center">
                    <h2>Bagaimana Cara Saya Membuat Pengaduan?</h2>
                </div>
            </div>
        </div>
        <!-- Section caption -->
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="services-caption text-center mb-30">
                    <div class="service-icon">
                        <span class="flaticon-businessman"></span>
                    </div>
                    <div class="service-cap">
                        <h4><a href="#">Login</a></h4>
                        <p>Pastikan anda login dan jika melum memiliki akun dapat mendaftar <a class="text-primary"
                                href="{{ route('masyarakat.register') }}">disini.</a></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="services-caption text-center mb-30">
                    <div class="service-icon">
                        <span class=""><img src="{{ asset('front') }}/img/freepik/pen-filled-writing-tool.png"
                                width="40%"></span>

                    </div>
                    <div class="service-cap">
                        <h4><a href="#pengaduan">Tulis Laporan</a></h4>
                        <p>Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="services-caption text-center mb-30">
                    <div class="service-icon">
                        <span class=""><img src="{{ asset('front') }}/img/freepik/list.png" width="45%"></span>
                    </div>
                    <div class="service-cap">
                        <h4><a href="#">Proses Verifikasi</a></h4>
                        <p>Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="services-caption text-center mb-30">
                    <div class="service-icon">
                        <span class=""><img src="{{ asset('front') }}/img/freepik/support.png" width="45%"></span>
                    </div>
                    <div class="service-cap">
                        <h4><a href="#">Proses Tindak Lanjut</a></h4>
                        <p>Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="services-caption text-center mb-30">
                    <div class="service-icon">
                        <span class=""><img src="{{ asset('front') }}/img/freepik/speech-bubble.png" width="45%"></span>
                    </div>
                    <div class="service-cap">
                        <h4><a href="#">Beri Tanggapan</a></h4>
                        <p>Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10 hari.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="services-caption text-center mb-30">
                    <div class="service-icon">
                        <span class="flaticon-plane"></span>
                    </div>
                    <div class="service-cap">
                        <h4><a href="#">Selesai</a></h4>
                        <p>Laporan Anda akan terus ditindaklanjuti hingga terselesaikan </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6">
            </div>
        </div>
    </div>
</section>
<!-- Services Area End -->
<!-- Our Customer Start -->
<div class="our-customer section-padd-top30">
    <div class="container-fluid">
        <div class="our-customer-wrapper">
            <!-- Section Tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-8">
                    <div class="section-tittle text-center">
                        <h2>Laporan Terselesaikan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="customar-active dot-style d-flex dot-style">
                        @foreach ($samples as $sample)

                        <div class="single-customer mb-100">
                            <div class="what-img">
                                <img src="{{ asset('front') }}/img/shape/man1.png" alt="">
                            </div>
                            <div class="what-cap">
                                <h4><a href="#">{{ $sample->nama }}</a></h4>
                                <p>Utenim ad minim veniam quisnostrud exercitation ullamcolabor nisiut aliquip
                                    ex ea commodo consequat duis aute irure dolor in represse.</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our Customer End -->
<!-- Say Something Start -->
<div class="say-something-aera pt-90 pb-90 fix">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="offset-xl-1 offset-lg-1 col-xl-5 col-lg-5">
                <div class="say-something-cap">
                    <h2>Hello, <br> This website is made by Neddy AP.</h2>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3">
                <div class="say-btn">
                    <a href="#" class="btn radius-btn">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- shape -->
    <div class="say-shape">
        <img src="{{ asset('front') }}/img/shape/say-shape-left.png" alt=""
            class="say-shape1 rotateme d-none d-xl-block">
        <img src="{{ asset('front') }}/img/shape/say-shape-right.png" alt="" class="say-shape2 d-none d-lg-block">
    </div>
</div>
<!-- Say Something End -->

<script>
    $("button").click(function() {
    $('html,body').animate({
        scrollTop: $(".second").offset().top},
        'slow');
});
</script>
@endsection
