@extends('layouts.admin.default')

@section('custom-head')
    <link href="{{ asset('tbk/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('tbk/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <script src="{{ asset('tbk/vendor/quill/quill.js') }}"></script>
@endsection

@section('content')
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Cập nhật</h3>
                <!-- Browser Default Validation -->
                <form class="row g-3" method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 col-sm-6">
                        <label for="code" class="form-label">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="0" @selected(old('status') ? old('status') == 0 : $product->status == 0)>Không hiển thị</option>
                            <option value="1" @selected(old('status') ? old('status') == 1 : $product->status == 1)>Còn hàng</option>
                            <option value="2" @selected(old('status') ? old('status') == 2 : $product->status == 2)>Hết hàng</option>
                        </select>
                        @if ($errors->get('status'))
                            <small class="mb-0 ms-2 text-danger">
                                {{ $errors->get('status')[0] }}
                            </small>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ old('name') ? old('name') : $product->name }}">
                        @if ($errors->get('name'))
                            <small class="mb-0 ms-2 text-danger">
                                {{ $errors->get('name')[0] }}
                            </small>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">Danh mục sản phẩm</label>
                        <select name="category" class="form-control">
                        <option value="1" @selected(old('category') == 1)>XI MĂNG</option>
                            <option value="2" @selected(old('category') == 2)>KEO/ VỮA XÂY DỰNG</option>
                            <option value="3" @selected(old('category') == 3)>GẠCH ĐÁ ỐP LÁT</option>
                            <option value="4" @selected(old('category') == 4)>VẬT LIỆU CHỐNG THẤM</option>
                            <option value="5" @selected(old('category') == 5)>NGÓI LỢP</option>
                        </select>
                        @if ($errors->get('category'))
                            <small class="mb-0 ms-2 text-danger">
                                {{ $errors->get('category')[0] }}
                            </small>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="image_name" class="form-label">Hình ảnh sản phẩm</label>
                        <input type="file" class="form-control" name="image_name">
                        @if ($errors->get('image_name'))
                            <small class="mb-0 ms-2 text-danger">
                                {{ $errors->get('image_name')[0] }}
                            </small>
                        @endif
                        <img src="{{ asset($product->image_url) }}" alt="" width="250" height="100" class="mt-2">
                        <input type="text" class="form-control" name="image_url_old" value="{{ $product->image_url }}"
                            hidden>
                    </div>
                    <div class="col-12">
                        <label for="price" class="form-label">Giá bán sản phẩm</label>
                        <input type="text" class="form-control" id="price" name="price"
                            value="{{ old('price') ? old('price') : number_format($product->price, 0, '', '.') }}"
                            oninput="getChange('price')">
                        @if ($errors->get('price'))
                            <small class="mb-0 ms-2 text-danger">
                                {{ $errors->get('price')[0] }}
                            </small>
                        @endif
                    </div>
                    <div class="col-12">
                        <div>
                            <label for="description" class="form-label">Thông số sản phẩm</label>
                            @if ($errors->get('description') || $errors->get('empty_description'))
                                <small class="mb-0 ms-2 text-danger">
                                    {{ $errors->get('description') ? $errors->get('description')[0] : $errors->get('empty_description')[0] }}
                                </small>
                            @endif
                            <input type="hidden" name="empty_description" value="true" id="empty_description">
                            <input type="hidden" name="description"
                                value="{{ old('description') ? old('description') : $product->description }}"
                                id="description">
                            <!-- Create the editor container -->
                            <div id="editor">
                                {!! old('description') ? old('description') : $product->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" name="id" value="{{ $product->id }}">Xác
                            nhận</button>
                    </div>
                </form>
                <!-- End Browser Default Validation -->
            </div>
        </div>
    </section>
    <script>
        var editor = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    ['link', 'image', 'video'],
                    [{
                        'header': 1
                    }, {
                        'header': 2
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }, {
                        'list': 'check'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'size': ['small', false, 'large', 'huge', ]
                    }],
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'font': []
                    }],
                    [{
                        'align': []
                    }]
                ]
            }
        });
        editor.on('text-change', function() {
            $('#description').val(editor.root.innerHTML)
            $('#empty_description').val(editor.root.className === 'ql-editor ql-blank')
        });
        $('#empty_description').val(editor.root.className === 'ql-editor ql-blank');

        function getChange(element) {
            // 48 - 57 (0-9)
            const target = document.querySelector("#" + element)
            let str1 = target.value;
            if (str1 === '') {
                return
            }
            if (str1[str1.length - 1].charCodeAt() < 48 || str1[str1.length - 1].charCodeAt() > 57) {
                target.value = str1.substring(0, str1.length - 1);
                return;
            }
            let amount = target.value.replaceAll('.', '')
            amount = amount.replaceAll(',', '')
            if (amount.length > 15) {
                target.value = str1.substring(0, str1.length - 1);
                return;
            }
            const formatter = new Intl.NumberFormat('de-DE', {
                maximumFractionDigits: 0,
                unitDisplay: 'long'
            });
            target.value = formatter.format(parseInt(amount))
        }
    </script>
@stop
