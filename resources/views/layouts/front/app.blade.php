<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Layanan Aspirasi dan Pengaduan Online Masyarakat</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front') }}/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('front') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/slicknav.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/responsive.css">


    <link rel="stylesheet" href="{{ asset('template') }}/node_modules/dropzone/dist/min/dropzone.min.css">
</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('front') }}/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        @include('layouts.front.header')
        <!-- Header End -->
    </header>

    <main>

        @yield('content')

    </main>
    <footer>

        <!-- Footer Start-->
        @include('layouts.front.footer')
        <!-- Footer End-->

    </footer>

    <!-- JS here -->
    <script src="{{ asset('template') }}/node_modules/dropzone/dist/min/dropzone.min.js"></script>

    <!-- All JS Custom Plugins Link Here here -->

    <script src="{{ asset('front') }}/js/dropzone.js"></script>
    <script src="{{ asset('front') }}/js/vendor/modernizr-3.5.0.min.js"></script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('front') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('front') }}/js/popper.min.js"></script>
    <script src="{{ asset('front') }}/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('front') }}/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('front') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('front') }}/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="{{ asset('front') }}/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('front') }}/js/wow.min.js"></script>
    <script src="{{ asset('front') }}/js/animated.headline.js"></script>
    <script src="{{ asset('front') }}/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('front') }}/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('front') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('front') }}/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="{{ asset('front') }}/js/contact.js"></script>
    <script src="{{ asset('front') }}/js/jquery.form.js"></script>
    <script src="{{ asset('front') }}/js/jquery.validate.min.js"></script>
    <script src="{{ asset('front') }}/js/mail-script.js"></script>
    <script src="{{ asset('front') }}/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('front') }}/js/plugins.js"></script>
    <script src="{{ asset('front') }}/js/main.js"></script>

    <script src="{{ asset('template') }}/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('template') }}/js/page/modules-sweetalert.js"></script>
    @include('sweetalert::alert')

</body>

</html>
