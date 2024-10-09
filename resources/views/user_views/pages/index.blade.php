@extends('/user_views/master')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div id="content" class="content-area" role="main">
        {{-- Banner --}}
        <div style="background: red">
            <div id="carouselBanners" class="carousel slide h-100 w-100" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner h-100 w-100">
                    <div class="carousel-item h-100 active">
                        <img src="{{ asset('user/image/banner01.png') }}" class="img-banner d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{ asset('user/image/banner02.jpg') }}" class="img-banner d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>

        {{-- Items --}}
        <div class="container py-4 product">
            <div class="d-flex">
                <div>
                    <h3 class="text-uppercase">Xi măng</h3>
                </div>
                <div class="ms-auto my-auto">
                    <a href="/san-pham/xi-mang" class="text-decoration-none">
                        <div class="d-flex">
                            <h5 class="mb-0 text-primary">Xem thêm</h5>
                            <i class="fa-solid fa-arrow-right my-auto ms-2"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="product-list">
                <div class="row px-2 mx-auto">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card card-item mx-auto" onclick="window.location.href='/san-pham/1'">
                            <img src="{{ asset('user/image/logo.png') }}" width="264" height="264">
                            <div class="card-body">
                                <hr>
                                <p class="mb-1 fw-bold">Sản phẩm 001</p>
                                <small class="mb-1">{{ config("constants.categories.1") }}</small>
                                <p class="mb-1 fw-bold">Giá: {{ number_format(1000000, 0,0, '.') }}đ</p>
                                <form action="{{ route('user.cart.add') }}" method="POST" class="mb-0">
                                    @csrf
                                    <button @class(['btn btn-primary w-100', 'disabled-button' => 1 != 1]) class="btn btn-primary w-100">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extended-script')
    <script>
        const hotProductTotal = {{ count($hot_products) }}
        $('.item-slider').slick({
            arrows: false,
            infinite: true,
            adaptiveHeight: true,
            slidesToScroll: 1,
            slidesToShow: hotProductTotal > 3 ? 3 : hotProductTotal,
            autoplay: true,
            autoplaySpeed: 2000,
            speed: 1000,
            dots: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: hotProductTotal > 3 ? 3 : hotProductTotal,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 867,
                    settings: {
                        slidesToShow: hotProductTotal > 2 ? 2 : hotProductTotal,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
@endsection
