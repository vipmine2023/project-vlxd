@extends('layouts.admin.default')

@section('content')
    <section class="section dashboard">
        <p class="h2">Chi tiết đơn hàng</p>
        <div>
          @foreach ($order_details as $order_detail)
          <div class="card">
            <div class="card-body py-3">
              <div class="row">
                <div class="col-3 text-left">
                  Mã hóa đơn
                </div>
                <div class="col-3 text-left">
                  Tên sản phẩm
                </div>
                <div class="col-3 text-left">
                  Số lượng
                </div>
                <div class="col-3 text-left">
                  Đơn giá
                </div>
              </div>
              <div class="row">
                <div class="col-3 text-left">
                  {{ $order_detail->code }}
                </div>
                <div class="col-3 text-left">
                  {{ $order_detail->product_name }}
                </div>
                <div class="col-3 text-left">
                  {{ $order_detail->quantity }}
                </div>
                <div class="col-3 text-left">
                  {{ number_format($order_detail->price, 0, '', '.') }}₫
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <form class="row g-3" method="POST" action="{{ route('admin.orders.update') }}">
          @csrf
          <div class="col-12 text-center">
            <a href="/admin/hoa-don" class="btn btn-secondary width-100px">Trở về</a>
            <input type="hidden" value='{{$order_details[0]->order_id}}' name="id" id="id">
            <input type="hidden" value='1' name="status" id="status">
            <button class='btn btn-primary ms-2 width-100px {{ $order_details[0]->status == 1 || $order_details[0]->status == 2 ? 'disabled': '' }}' type="submit">Xác nhận</button>
          </div>
        </form>
    </section>

    <script>
    </script>
@stop
