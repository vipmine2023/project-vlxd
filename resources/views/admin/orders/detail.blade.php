@extends('layouts.admin.default')

@section('content')
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Chi tiết</h2>
                <form class="row g-3" method="POST" action="{{ route('admin.orders.update') }}">
                    @csrf
                    <div class="row mx-auto">                        
                      <div class="col-12 col-md-2">
                        Mã hóa đơn:
                      </div>
                      <div class="col-12 col-md-10">
                        {{ $order->code }}
                      </div>
                    </div>
                    <div class="row mx-auto">                        
                      <div class="col-12 col-md-2">
                        Tên sản phẩm:
                      </div>
                      <div class="col-12 col-md-10">
                        {{ $order->product_name }}
                      </div>
                    </div>
                    <div class="row mx-auto">                        
                      <div class="col-12 col-md-2">
                        Đơn giá:
                      </div>
                      <div class="col-12 col-md-10">
                        {{ $order->price }} VND
                      </div>
                    </div>
                    <div class="row mx-auto">                        
                      <div class="col-12 col-md-2">
                        Số lượng:
                      </div>
                      <div class="col-12 col-md-10">
                        {{ $order->quantity }}
                      </div>
                    </div>
                    <div class="row mx-auto">                        
                      <div class="col-12 col-md-2">
                        Tên KH:
                      </div>
                      <div class="col-12 col-md-10">
                        {{ $order->receiver_name }}
                      </div>
                    </div>
                    <div class="row mx-auto">                        
                      <div class="col-12 col-md-2">
                        Email:
                      </div>
                      <div class="col-12 col-md-10">
                        {{ $order->email }}
                      </div>
                    </div>
                    <div class="row mx-auto">                        
                      <div class="col-12 col-md-2">
                        Số điện thoại:
                      </div>
                      <div class="col-12 col-md-10">
                        {{ $order->phone }}
                      </div>
                    </div>
                    <div class="row mx-auto">                        
                      <div class="col-12 col-md-2">
                        Địa chỉ:
                      </div>
                      <div class="col-12 col-md-10">
                        {{ $order->address }}
                      </div>
                    </div>
                    <div class="col-12">
                        <a href="/admin/hoa-don" class="btn btn-secondary">Trở về</a>
                        <input type="hidden" value='{{$order->id}}' name="id" id="id">
                        <button class='btn btn-primary {{ $order->status == 1 ? 'disabled': '' }}' type="submit">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
    </script>
@stop
