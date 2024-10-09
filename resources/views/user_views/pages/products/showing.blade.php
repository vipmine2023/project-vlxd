@extends('/user_views/master')

@section('title')
    <title>{{ $product->name }}</title>
@endsection

@section('content')
    <div id="content" class="container pt-4">
        <div class="row px-sm-4 py-sm-4">
            <div class="col-12 d-flex text-uppercase fw-bold">
                <a href="/" class="text-decoration-none text-breadcrumb">Trang chủ</a>
                <span class="px-2 d-flex">
                    <div class="veritical-breadcrumb"></div>
                </span>
                <a href="/san-pham" class="text-decoration-none text-breadcrumb">Sản phẩm</a>
                <span class="px-2 d-flex">
                    <div class="veritical-breadcrumb"></div>
                </span>
                <p class="text-2-line mb-0">{{ $product->name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 d-none d-md-block">
                <div class="h5 fw-bold text-uppercase">DANH MỤC SẢN PHẨM</div>
                <div class="border my-2 w-50"></div>
                @include('/user_views/components/menu')
            </div>
            <div class="col-12 col-md-8">
                <div class="px-4">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="p-2 pointer d-flex zoom">
                                <div class="m-auto">
                                    <img src="{{ asset($product->image_url) }}" alt="" width="512" height="512">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 pt-4 pt-md-0">
                            <div class="text-uppercase h4 fw-bold">
                                {{ $product->name }}
                            </div>
                            <hr>
                            <div class="text-red fw-bold h4">
                                {{ number_format($product->price, 0, '', '.') }}₫
                            </div>
                            <div>
                                @switch($product->status)
                                    @case(1)
                                        <p class="text-success mb-2">Còn hàng</p>
                                    @break
                                    @case(2)
                                        <p class="text-red mb-2">Hết hàng</p>
                                    @break
                                @endswitch
                            </div>
                            <span>
                                Danh mục:
                                <a href="/san-pham{{ config("constants.category_urls.$product->category") }}"
                                    class="text-decoration-none">
                                    {{ config("constants.categories.$product->category") }}
                                </a>
                            </span>
                            <hr>
                            <form action="{{ route('user.cart.add') }}" method="POST" class="mb-0">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button @class(['btn btn-primary w-100', 'disabled-button' => $product->status != 1]) class="btn btn-primary">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                    </div>
                <div class="border my-2"></div>
                <div class="row">
                    <div class="col-12">
                        <h3>Mô tả sản phẩm</h3>
                        <div class="ql-editor">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('/user_views/components/toast_message')
@endsection

@section('extended-script')
    
@endsection
