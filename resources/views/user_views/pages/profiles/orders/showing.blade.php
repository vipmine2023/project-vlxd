@extends('/user_views/master')

@section('title')
<title>ĐƠN HÀNG</title>
@endsection

@section('content')
<section class="container order-index py-4">
    <div class="d-flex justify-content-between">
        <p class="h2 fw-bold">Đơn hàng {{ $order->code }}</p>
        <div>
            <a href="/thong-tin/danh-sach-don-hang" class="btn btn-primary">Trở về</a>
            <a href="{{ '/thong-tin/don-hang/cancel/'.$order->code }}" @class(['btn btn-danger', 'disabled-button' => $order->status != 0])>Hủy</a>
        </div>
    </div>
    
    <hr>
    <div class="row mx-auto">
        <div class="col-12 col-md-6">
            <p>
                <span class="fw-bold">Tên người nhận: </span>
                {{ $order->receiver_name }}
            </p>
            <p>
                <span class="fw-bold">Email: </span>
                {{ $order->email }}
            </p>
            <p>
                <span class="fw-bold">Số điện thoại: </span>
                {{ $order->phone }}
            </p>
            <p>
                <span class="fw-bold">Địa chỉ nhận hàng: </span>
                {{ $order->address }}
            </p>
        </div>
        <div class="col-12 col-md-6">
            <p>
                <span class="fw-bold">Ngày tạo: </span>
                {{ date('d/m/Y h:m', strtotime($order->created_at)) }}
            </p>
            <p>
                <span class="fw-bold">Phương thức thanh toán: </span>
                {{ config("constants.payment_methods.$order->payment_method") }}
            </p>
            <p>
                <span class="fw-bold">Trạng thái đơn hàng: </span>
                <span @class(['text-success' => $order->status == 1, 'text-danger' => $order->status == 2])>
                    {{ config("constants.order_statuses.$order->status") }}
                </span>
            </p>
            <p>
                <span class="fw-bold">Ghi chú đơn hàng: </span>
                {{ $order->note }}
            </p>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order_details as $order_detail)
                    <tr>
                        <td>{{ $order_detail->product_name }}</td>
                        <td>{{ number_format($order_detail->price, 0, 0, '.') }}đ</td>
                        <td>{{ $order_detail->quantity }}</td>
                        <td>{{ number_format($order_detail->price * $order_detail->quantity, 0, 0, '.') }}đ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if (count($order_details) > 0)
        {{ $order_details->links() }}   
    @endif
    @include('/user_views/components/toast_message')
</section>
@endsection

@section('extended-script')
@endsection