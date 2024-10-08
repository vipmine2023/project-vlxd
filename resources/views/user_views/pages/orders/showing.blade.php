@extends('/user_views/master')

@section('title')
<title>THANH TOÁN</title>
@endsection

@section('content')
<section class="container py-4">
    <p class="h2 fw-bold">Thanh toán</p>
    <hr>
    <form action="{{ route('user.confirm') }}" method="POST">
        @csrf
        <div class="row mx-auto">
            <div class="col-12 col-md-7">
                <p class="h5 text-red text-uppercase fw-bold">Thông tin thanh toán</p>
                <div class="row mx-auto">
                    <div class="col-12 col-md-6 pb-2 pb-md-0">
                        <label for="email" class="form-label">
                            Địa chỉ email
                            (<span class="text-red">*</span>)
                        </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" value="{{ old('email') }}">
                        @if ($errors->get('email'))
                        <small class="mb-0 ms-2 text-danger">
                            {{ $errors->get('email')[0] }}
                        </small>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 pb-2 pb-md-0">
                        <label for="phone" class="form-label">
                            Số điện thoại
                            (<span class="text-red">*</span>)
                        </label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
                        @if ($errors->get('phone'))
                        <small class="mb-0 ms-2 text-danger">
                            {{ $errors->get('phone')[0] }}
                        </small>
                        @endif
                    </div>
                    <div class="col-12 pb-2 pt-md-2">
                        <label for="receiver_name" class="form-label">
                            Họ và tên
                            (<span class="text-red">*</span>)
                        </label>
                        <input type="text" class="form-control" id="receiver_name" name="receiver_name" placeholder="Nhập họ và tên" value="{{ old(key: 'receiver_name') }}">
                        @if ($errors->get('receiver_name'))
                        <small class="mb-0 ms-2 text-danger">
                            {{ $errors->get('receiver_name')[0] }}
                        </small>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">
                            Địa chỉ
                            (<span class="text-red">*</span>)
                        </label>
                        <textarea name="address" id="address" placeholder="Nhập địa chỉ nhận hàng">{{ old(key: 'address') }}</textarea>
                        @if ($errors->get('address'))
                        <small class="mb-0 ms-2 text-danger">
                            {{ $errors->get('address')[0] }}
                        </small>
                        @endif
                    </div>
                </div>
                <p class="h5 text-red text-uppercase fw-bold pt-2">Thông tin bổ sung</p>
                <div class="row mx-auto">
                    <div class="col-12">
                        <label for="note" class="form-label">
                            Ghi chú
                        </label>
                        <textarea name="note" id="note" placeholder="Ghi chú cho đơn hàng">{{ old(key: 'note') }}</textarea>
                        @if ($errors->get('note'))
                        <small class="mb-0 ms-2 text-danger">
                            {{ $errors->get('note')[0] }}
                        </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 mt-3 mt-md-0">
                <div class="col-inner h-100 border border-warning d-flex flex-column p-3">
                    <p class="h5 text-red text-uppercase fw-bold pt-2">Đơn hàng của bạn</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col" class="text-right">Giá tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1 x 
                                    <a href="/san-pham/1" class="text-decoration-none">Sản phẩm 001</a>
                                </td>
                                <td class="text-right">{{ number_format((1 * 150000), 0, 0, '.') }} đ</td>
                            </tr>
                            <tr>
                                <td>
                                    2 x 
                                    <a href="/san-pham/1" class="text-decoration-none">Sản phẩm 002</a>
                                </td>
                                <td class="text-right">{{ number_format((2 * 150000), 0, 0, '.') }} đ</td>
                            </tr>

                            <tr class="fw-bold">
                                <td>Tổng</td>
                                <td class="text-right">{{ number_format((2 * 150000 + 150000), 0, 0, '.') }} đ</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod" value="1" checked>
                        <label class="form-check-label" for="paymentMethod">
                            Trả tiền mặt khi nhận hàng
                        </label>
                    </div>
                    <div class="pt-2 mt-auto">
                        <button class="btn btn-primary w-100">Đặt hàng</button>
                        <small class="pt-1">
                            Thông tin cá nhân của bạn sẽ được sử dụng để xử lý đơn hàng, tăng trải nghiệm sử dụng website, và cho các mục đích cụ thể khác đã được mô tả trong chính sách riêng tư.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection

@section('extended-script')

@endsection