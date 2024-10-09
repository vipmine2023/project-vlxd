@extends('layouts.admin.default')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-info">
            {{ $message }}
        </div>
    @endif
    <div class="pb-2">
        <form action="/admin/hoa-don" method="get">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                    <select class="form-select" name="status">
                        <option value="9" @selected(Request::get('status') === '9')>Tất cả</option>
                        <option value="0" @selected(Request::get('status') === '0')>Chờ xác nhận</option>
                        <option value="1" @selected(Request::get('status') === '1')>Xác nhận</option>
                    </select>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-2 pt-2 pt-md-0 d-flex">
                    <button class="btn btn-primary mx-auto mx-md-0">Lọc</button>
                </div>
            </div>
        </form>
    </div>
    <section class="section dashboard">
        <div class="overflow-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mã hóa đơn</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td width="300">
                                <p class="text-2-line">{{ $order->code }}</p>
                            </td>
                            <td>
                                <p class="text-2-line">{{ $order->status == 0 ? 'Chưa xác nhận': 'Đã xác nhận' }}</p>
                            </td>
                            <td>
                                <p class="text-2-line">{{ $order->product_name }}</p>
                            </td>
                            <td>
                                <p class="text-2-line">{{ $order->quantity }}
                            <td width="250">
                                <a class="btn btn-success width-100px" href="/admin/hoa-don/{{ $order->id }}/chi-tiet">Chi tiết</a>
                                <a class='btn btn-primary width-100px {{ $order->status == 1 ? 'disabled': '' }}' data-bs-toggle="modal" href="#modalConfirm" onclick="showConfirmModal({{$order->id}})"
                                    role="button">Xác nhận</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $orders->links() }}
        </div>

        <div class="modal fade" id="modalConfirm" aria-hidden="true"
            aria-labelledby="modalConfirm" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalConfirm">Thông báo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn xác nhận hóa đơn?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <form action="{{ route('admin.orders.update') }}" method="post">
                            @csrf
                            @method('POST')
                            <input type="hidden" value="0" name="id" id="id">
                            <button type="submit" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-dismiss="modal">Xác
                                Nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
<!-- End #main -->

@section('extend_js')
    <script>
        function showConfirmModal(id = 0) {
            $('#modalConfirm input#id').val(id)
        }
    </script>
@stop
