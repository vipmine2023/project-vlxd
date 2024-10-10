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
            @foreach ($products as $key => $product)
                @if (count($product) > 0)
                <div class="d-flex">
                    <div>
                        <p class="text-uppercase h3 fw-bold">{{ config("constants.showing.$key.name") }}</p>
                    </div>
                    <div class="ms-auto my-auto">
                        <a href="{{ config("constants.showing.$key.url") }}" class="text-decoration-none">
                            <div class="d-flex">
                                <h5 class="mb-0 text-primary">Xem thêm</h5>
                                <i class="fa-solid fa-arrow-right my-auto ms-2"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="product-list pb-3">
                    <div class="row px-2 mx-auto">
                        @foreach ($product as $item)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card card-item mx-auto" onclick="window.location.href='{{ '/san-pham/'.$item->id }}'">
                                <div class="px-2 pt-2">
                                    <img src="{{ asset($item->image_url) }}" width="264" height="240" style="height: 240px">
                                </div>
                                <div class="card-body pt-0">
                                    <hr>
                                    <p class="text-1-line mb-1 fw-bold">{{ $item->name }}</p>
                                    <small class="mb-1">{{ config("constants.categories.$item->category") }}</small>
                                    <p class="mb-1 fw-bold">Giá: {{ number_format($item->price, 0,0, '.') }}đ</p>
                                    <form action="{{ route('user.cart.add') }}" method="POST" class="mb-0">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <button @class(['btn btn-primary w-100', 'disabled-button' => $item->status != 1]) class="btn btn-primary w-100">Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('extended-script')
@endsection
