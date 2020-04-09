<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin &mdash; Control Panel</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('template') }}/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/node_modules/@fortawesome/fontawesome-free/css/all.css">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('template') }}/node_modules/bootstrap-social/bootstrap-social.css" />
    <link rel="stylesheet" href="{{ asset('template') }}/node_modules/jqvmap/dist/jqvmap.min.css">f
    <link rel="stylesheet" href="{{ asset('template') }}/node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="{{ asset('template') }}/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="{{ asset('template') }}/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/node_modules/ionicons201/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/node_modules/chocolat/dist/css/chocolat.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/components.css">

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('layouts.admin.navbar')

            @include('layouts.admin.sidebar')

            @yield('content')

            @include('layouts.admin.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    {{-- <script src="{{ asset('template') }}/js/jquery-3.3.1.min.js"></script> --}}
    {{-- <script src="{{ asset('template') }}/js/popper.min.js"></script>
    <script src="{{ asset('tempalte') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('tempalte') }}/js/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('tempalte') }}/js/moment.min.js"></script> --}}
    <script src="{{ asset('template') }}/js/stisla.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <!-- JS Libraies -->
    {{-- <script src="{{ asset('template') }}/node_modules/jquery/dist/jquery.slim.js"></script> --}}
    {{-- <script src="{{ asset('template') }}/js/popper.min.js"></script> --}}
    {{--  --}}
    <script src="{{ asset('template') }}/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('template') }}/node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('template') }}/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="{{ asset('template') }}/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="{{ asset('template') }}/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="{{ asset('template') }}/node_modules/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Template JS File -->
    <script src="{{ asset('template') }}/js/scripts.js"></script>
    <script src="{{ asset('template') }}/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('template') }}/js/page/index.js"></script>
    <script src="{{ asset('template') }}/js/page/modules-sweetalert.js"></script>

    @include('sweetalert::alert')
</body>

</html>
