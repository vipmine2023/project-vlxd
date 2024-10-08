@extends('/user_views/master')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div id="content" class="content-area" role="main">
        {{-- Banner --}}
        <!-- <div style="background: red">
            <div id="carouselBanners" class="carousel slide h-100 w-100" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner h-100 w-100">
                    <div class="carousel-item h-100 active">
                        <img src="{{ asset('img/banners/banner1.png') }}" class="img-banner d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{ asset('img/banners/banner2.png') }}" class="img-banner d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div> -->

        {{-- Hot items --}}
        <!-- @if (count($hot_products) > 0)
            <div class="bg-hot-items mb-4 pb-4">
                <div class="container px-5">
                    <div class="d-flex py-4">
                        <img class="mx-auto" src="{{ asset('img/homepage/hot-items.png') }}" alt="hot-item">
                    </div>
                    <div class="item-slider d-flex">
                        @foreach ($hot_products as $hot_product)
                            <div class="px-2 d-flex">
                                <div class="card-hot-product bg-white mx-auto position-relative my-1">
                                    <div class="d-flex hot-product-image">
                                        <div class="my-auto mx-auto">
                                            <img src="{{ $hot_product->image_url }}" alt="hot-item-image">
                                        </div>
                                    </div>
                                    <div class="card-overlay">
                                        <div class="items"></div>
                                        <div class="items head">
                                            <p class="text-3-line height-120px">{{ $hot_product->name }}</p>
                                            <hr>
                                        </div>
                                        <div class="items price">
                                            @if ($hot_product->discount_price)
                                                <p class="old">{{ number_format($hot_product->price, 0, '', '.') }} ₫</p>
                                                <p class="new">
                                                    {{ number_format($hot_product->discount_price, 0, '', '.') }} ₫</p>
                                            @else
                                                <p class="new">{{ number_format($hot_product->price, 0, '', '.') }} ₫
                                                </p>
                                            @endif
                                        </div>
                                        <div class="items detail-link">
                                            <div class="d-flex">
                                                <a href="/san-pham/{{ $hot_product->id }}"
                                                    class="text-decoration-none text-card">
                                                    <span class="mb-0 text-uppercase h6 fw-bold">Chi
                                                        tiết</span>
                                                    <i class="fa-solid fa-arrow-right my-auto ms-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif -->

        {{-- Items --}}
        <!-- <div class="container py-4 product">
            <div class="d-flex">
                <div>
                    <h3>SẢN PHẨM</h3>
                </div>
                <div class="ms-auto my-auto">
                    <a href="/san-pham" class="text-decoration-none">
                        <div class="d-flex">
                            <h5 class="mb-0 text-primary text-toboki">Xem thêm</h5>
                            <i class="fa-solid fa-arrow-right my-auto ms-2 text-toboki"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="product-list">
                @if (count($products) == 0)
                    <div class="text-center">
                        Chưa có sản phẩm.
                    </div>
                @else
                    <div class="row px-2 mx-0">
                        @foreach ($products as $product)
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card mx-auto h-100 card-product pointer border-0">
                                    <div class="card-overlay">
                                        <div class="m-auto">
                                            <a href="/san-pham/{{ $product->id }}"
                                                class="btn btn-toboki rounded-pill border-0">
                                                Chi tiết
                                            </a>
                                        </div>
                                    </div>
                                    <div class="position-relative d-flex card-img mb-2">
                                        <div class="m-auto">
                                            <img class="rounded mx-auto w-100 product-card-image"
                                                src="{{ $product->image_url }}" alt="product">
                                        </div>
                                        @if ($product->discount_price)
                                            <div class="position-absolute end-0 pe-2 pt-2">
                                                <img src="{{ asset('img/homepage/flash-sale.png') }}"
                                                    class="position-absoulte" width="40" height="40" alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-body border-top mt-auto">
                                        <small
                                            class="text-secondary">{{ config("constants.categories.$product->category") }}</small>
                                        <p class="text-height text-2-line">{{ $product->name }}</p>
                                        <div class="card-price">
                                            @if ($product->discount_price)
                                                <span class="me-2 text-decoration-line-through d-inline-block">
                                                    {{ number_format($product->price, 0, '', '.') }} ₫
                                                </span>
                                            @endif
                                            <span class="h5 d-inline-block text-red">
                                                @if ($product->discount_price)
                                                    {{ number_format($product->discount_price, 0, '', '.') }}
                                                @else
                                                    {{ number_format($product->price, 0, '', '.') }}
                                                @endif
                                                ₫
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div> -->
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
