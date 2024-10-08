<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('/img/homepage/favicon.ico') }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>VLXD - Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="{{ asset('tbk/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('tbk/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('tbk/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tbk/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('tbk/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tbk/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('tbk/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('tbk/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('tbk/css/custom.css') }}" rel="stylesheet">

    <script src="{{ asset('tbk/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('tbk/jquery/jquery-migrate.min.js') }}"></script>

    @yield('custom-head')
</head>

{{-- <body> --}}

<body class="body">
    <!--sidebar-->
    @include('layouts.admin.sidebar')
    <!--end sidebar-->
    <!--start header -->
    @include('layouts.admin.header')
    <!--end header -->
    <!--start page-->
    <main id="main" class="main overflow-hidden">
        @yield('content')
    </main>
    <!--end page-->
    @include('layouts.admin.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="{{ asset('tbk/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('tbk/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('tbk/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('tbk/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('tbk/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('tbk/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('tbk/js/main.js') }}"></script>
    @yield('extend_js')
</body>

</html>
