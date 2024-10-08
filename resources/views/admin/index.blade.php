@extends('layouts.admin.default')

@section('content')
    <section class="section dashboard">
        @if ($message = Session::get('success'))
            <div class="alert alert-info">
                {{ $message }}
            </div>
        @endif
        <div class="pb-2">
            <form action="/admin" method="get">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                        <select class="form-select" name="category-number">
                            <option value="0" @selected(Request::get('category-number') === '0')>Tất cả</option>
                            <option value="1" @selected(Request::get('category-number') === '1')>XI MĂNG</option>
                            <option value="2" @selected(Request::get('category-number') === '2')>KEO/ VỮA XÂY DỰNG</option>
                            <option value="3" @selected(Request::get('category-number') === '3')>GẠCH ĐÁ ỐP LÁT</option>
                            <option value="4" @selected(Request::get('category-number') === '4')>VẬT LIỆU CHỐNG THẤM</option>
                            <option value="5" @selected(Request::get('category-number') === '5')>NGÓI LỢP</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 col-lg-7 col-xl-8 pt-2 pt-md-0">
                        <input type="text" class="form-control" name="search-key"
                            placeholder="Nhập mã hoặc tên sản phẩm cần tìm" value="{{ Request::get('search-key') }}">
                    </div>
                    <div class="col-12 col-md-2 col-lg-2 col-xl-2 pt-2 pt-md-0 d-flex">
                        <button class="btn btn-primary mx-auto mx-md-0">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="overflow-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Danh mục sản phẩm</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <td width="200">
                                    <p class="mb-0 text-3-line">{{ $product->name }}</p>
                                </td>
                                <td>{{ config("constants.categories.$product->category") }}</td>
                                <td>{{ config("constants.statuses.$product->status") }}</td>
                                <td><img src="{{ asset($product->image_url) }}" alt="producrt-image" width="150px" height="70px">
                                </td>
                                <td>{{ number_format($product->price, 0, '', '.') }} ₫</td>
                                <td width="250">
                                    <a href="{{ route('admin.edit', $product->id) }}" class="btn btn-primary"
                                        style="width: 100px">Cập nhật</a>
                                    <a class="btn btn-danger" data-bs-toggle="modal"
                                        href="#exampleModalToggle{{ $product->id }}" role="button"
                                        style="width: 100px">Xóa</a>
                                </td>
                            </tr>

                            <div class="modal fade" id="exampleModalToggle{{ $product->id }}" aria-hidden="true"
                                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalToggleLabel">Thông báo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc chắn muốn xóa?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <form action="{{ route('admin.delete') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" name="id"
                                                    value="{{ $product->id }}" data-bs-toggle="modal"
                                                    data-bs-dismiss="modal">Xác
                                                    Nhận</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center">
                                Không tìm thấy sản phẩm nào.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div>
            {{ $products->links() }}
        </div>
    </section>
@stop
<!-- End #main -->

@section('extend_js')
@stop
