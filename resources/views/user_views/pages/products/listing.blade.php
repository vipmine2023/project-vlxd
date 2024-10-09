@extends('/user_views/master')

@section('title')
    @if (config("constants.categories.$categoryNumber"))
        <title>{{ config("constants.categories.1") }}</title>
    @else
        <title>Sản phẩm</title>
    @endif
@endsection

@section('content')
    <div id="content" class="container pt-4">
        <div class="row px-sm-4 py-sm-4">
            <div class="col-12 col-sm-6 d-flex text-uppercase fw-bold">
                <a href="/" class="text-decoration-none text-breadcrumb">Trang chủ</a>
                <span class="px-2 d-flex">
                    <div class="veritical-breadcrumb"></div>
                </span>
                @if (config("constants.categories.$categoryNumber"))
                    <a href="/san-pham" class="text-decoration-none text-breadcrumb">Sản phẩm</a>
                    <span class="px-2 d-flex">
                        <div class="veritical-breadcrumb"></div>
                    </span>
                    {{ config("constants.categories.$categoryNumber") }}
                @else
                    Sản phẩm
                @endif
            </div>
            <div class="col-12 col-sm-6">
                <p class="text-sm-end mb-0">Hiển thị tất cả {{ count($products) }} kết quả</p>
            </div>
        </div>
        <div class="text-center h4 fw-bold text-uppercase mb-0 py-2 py-sm-0">Danh sách sản phẩm</div>
        <div class="row">
            <div class="col-4 d-none d-md-block">
                <div class="h5 fw-bold text-uppercase">DANH MỤC SẢN PHẨM</div>
                <div class="border my-2 w-50"></div>
                @include('/user_views/components/menu')
            </div>
            <div class="col-12 col-md-8 px-0">
                <div class="row">
                    <div class="col-12 px-0">
                        <form action="/{{ $pathInfo }}" method="GET" class="mb-0 py-2 form-input">
                            <div class="row align-items-center">
                                <div class="col-3 mt-0 px-0">
                                    <label for="searchTxt" class="col-form-label">Tìm kiếm: </label>
                                </div>
                                <div class="col-9 mt-0 px-0 position-relative">
                                    <div class="d-flex flex-row-reverse form-icon-search">
                                        <button class="icon-button">
                                            <i class="fa-solid fa-magnifying-glass m-auto pointer"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="key-search" size="11"
                                        placeholder="Nhập tên sản phẩm bạn muốn tìm" id="searchTxt"
                                        value="{{ Request::get('key-search') }}" class="form-control input-search">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if (count($products) > 0)
                    <div class="row product product-list">
                        @foreach ($products as $product)
                            <div class="col-6 col-lg-4">
                                <div class="card card-item mx-auto" onclick="window.location.href='{{ '/san-pham/'.$product->id }}'">
                                    <div class="px-2 pt-2">
                                        <img src="{{ asset($product->image_url) }}" width="264" height="264">
                                    </div>
                                    <div class="card-body pt-0">
                                        <hr>
                                        <p class="text-1-line mb-1 fw-bold">{{ $product->name }}</p>
                                        <small class="mb-1">{{ config("constants.categories.$product->category") }}</small>
                                        <p class="mb-1 fw-bold">Giá: {{ number_format($product->price, 0,0, '.') }}đ</p>
                                        <form action="{{ route('user.cart.add') }}" method="POST" class="mb-0">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button @class(['btn btn-primary w-100', 'disabled-button' => $product->status != 1]) class="btn btn-primary w-100">Thêm vào giỏ hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center py-4 pagition-block pagination">
                        {{ $products->onEachSide(3)->links() }}
                    </div>
                @else
                    <div class="text-center">
                        Không tìm thấy sản phẩm nào.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('extended-script')
<script>
    const params = new URLSearchParams(window.location.search)
    params.delete('category-search')
    if (params.toString()) {
        history.pushState(null, null, "?" + params.toString())
    }
    
</script>
@endsection
