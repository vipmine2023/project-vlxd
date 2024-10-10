@extends('/user_views/master')

@section('title')
<title>DANH SÁCH ĐƠN HÀNG</title>
@endsection

@section('content')
<section class="container order-index py-4">
    <p class="h2 fw-bold">Danh sách đơn hàng</p>
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Ngày tạo</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (count($orders) > 0)
                    @foreach ($orders as $order)
                        <tr class="align-middle">
                            <td>{{ $order->code }}</td>
                            <td width="160" style="min-width: 160px">{{ date('d/m/Y h:m', strtotime($order->created_at)) }}</td>
                            <td width="160"  style="min-width: 160px">{{ $order->phone }}</td>
                            <td width="120" style="min-width: 120px" @class([
                                'text-success' => $order->status == 1,
                                'text-danger' => $order->status == 2,
                            ])>
                                {{ config("constants.order_statuses.$order->status") }}
                            </td>
                            <td width="172"  style="min-width: 172px">
                                <a href="{{ '/thong-tin/don-hang/'.$order->code }}" class="btn btn-primary">Chi tiết</a>
                                <a href="{{ '/thong-tin/don-hang/cancel/'.$order->code }}" @class(['btn btn-danger', 'disabled-button' => $order->status != 0])>Hủy</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">
                        Bạn không có đơn hàng nào.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    @if (count($orders) > 0)
        {{ $orders->links() }}   
    @endif
    @include('/user_views/components/toast_message')
</section>
@endsection

@section('extended-script')
@endsection