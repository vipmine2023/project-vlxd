<!DOCTYPE html>
<html lang="vi" class="js"><!--<![endif]-->

<head>
    <link rel="icon" href="{{ asset('img/homepage/favicon.ico') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" data-savepage-href="http://gmpg.org/xfn/11" href="">
    <link rel="pingback" data-savepage-href="https://demo.makeweb.vn/xmlrpc.php" href="">
    <script data-savepage-src="https://demo.makeweb.vn/wp-includes/js/zxcvbn.min.js" data-savepage-type="text/javascript" type="text/plain" async=""></script>
    <script data-savepage-type="" type="text/plain" data-savepage-src="https://connect.facebook.net/vi_VN/sdk.js?hash=3708f806149c114e81decc859205635f" async="" crossorigin="anonymous"></script>
    <script data-savepage-type="" type="text/plain" id="facebook-jssdk" data-savepage-src="//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=104537736801666"></script>
    <script data-savepage-type="" type="text/plain"></script>
    @yield('title')
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="dns-prefetch" data-savepage-href="//fonts.googleapis.com" href="">
    <link rel="alternate" type="application/rss+xml" title="Dòng thông tin Bách Hoá »"
        data-savepage-href="https://demo.makeweb.vn/feed/" href="">
    <link rel="alternate" type="application/rss+xml" title="Dòng phản hồi Bách Hoá »"
        data-savepage-href="https://demo.makeweb.vn/comments/feed/" href="">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/main.css') }}" />

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- Slick --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    {{-- FontAwsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}" />

    @yield('custom-head')
</head>

<body>
    @include('/user_views/layouts/header')

    <main class="padding-header">
        @yield('content')
    </main>

    @include('/user_views/layouts/footer')
    @yield('extended-script')
</body>
