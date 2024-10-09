@extends('/user_views/master')

@section('title')
<title>GIỎ HÀNG</title>
@endsection

@section('content')
<section class="container py-4">
    <p class="h2 fw-bold">Giỏ hàng</p>
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3">Sản phẩm</th>
                    <th>Số lượng</th>
                    <th class="text-right">Tạm tính</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart_items as $cart_item)
                <tr>
                    <td class="align-middle" width="20">
                        @if($cart_item->options->status != 1)
                        <i class="fa-solid fa-triangle-exclamation text-danger" style="font-size: 20px"></i>
                        @endif
                        <form action="{{ route('user.cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{ $cart_item->rowId }}">
                            <i class="fa-solid fa-trash text-primary pointer" style="font-size: 20px" onclick="this.parentElement.submit()"></i>
                        </form>
                    </td>
                    <td width="180">
                        <img src="{{ asset($cart_item->options->image_url) }}" alt="product" class="border" width="160" height="160" style="height: 135px; min-width: 160px;">
                    </td>
                    <td class="align-middle" style="min-width: 300px">
                        <a href="{{ '/san-pham/'.$cart_item->id }}" class="text-decoration-none fs-5">{{ $cart_item->name }}</a>
                    </td>
                    <td class="align-middle" width="100">
                        <div class="d-flex flex-column align-items-center">
                            <p class="fs-6 fw-bold">{{ number_format($cart_item->price, 0, 0, '.') }}đ</p>
                            <p class="fs-6 fw-bold">x</p>
                            <form action="{{ route('user.cart.update_quantity') }}" method="POST">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{ $cart_item->rowId }}">
                                <input type="number" name="quantity" id="quantity" min="1" max="10" value="{{ $cart_item->qty }}" @disabled($cart_item->options->status != 1) onchange="updateQuantity(this)" style="width: 60px">
                            </form>
                        </div>
                    </td>
                    <td class="text-right align-middle fw-bold" width="100">
                        {{ number_format($cart_item->price * $cart_item->qty, 0, 0, '.') }}đ
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="">
        <p class="text-right">
            <span class="fw-bold">Tổng tiền: </span>
            <span class="text-red">{{ number_format($total, 0, 0, '.') }}đ</span>
        </p>
        <div class="d-flex justify-content-end">
            <a href="/thanh-toan" @class(['btn btn-primary', 'disabled-button'=> count($cart_items) == 0 || count($invalid_items) > 0])>Thanh toán</a>
        </div>
    </div>
    @include('/user_views/components/toast_message')
</section>
@endsection

@section('extended-script')
<script>
    function updateQuantity(event) {
        event.form.submit()
        $('form #quantity').attr('disabled', true)
    }
</script>
@endsection