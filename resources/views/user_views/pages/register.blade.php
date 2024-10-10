@extends('/user_views/master')

@section('title')
    <title>Đăng kí</title>
@endsection

@section('content')
    <div id="content" class="content-area container py-4" role="main">
        <div class="row mx-auto">
            <form action="{{ route('user.register') }}" method="POST" class="col-12 col-md-6 mx-auto">
                <p class="h3 fw-bold">Form Đăng Kí</p>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Họ tên</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nhập họ tên" value="{{ old('name') }}">
                    @if ($errors->get('name'))
                    <small class="mb-0 ms-2 text-danger">
                        {{ $errors->get('name')[0] }}
                    </small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Nhập địa chỉ email" value="{{ old('email') }}">
                    @if ($errors->get('email'))
                    <small class="mb-0 ms-2 text-danger">
                        {{ $errors->get('email')[0] }}
                    </small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="password"  placeholder="Nhập mật khẩu">
                    @if ($errors->get('password'))
                    <small class="mb-0 ms-2 text-danger">
                        {{ $errors->get('password')[0] }}
                    </small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"  placeholder="Nhập mật khẩu xác nhận">
                    @if ($errors->get('password_confirmation'))
                    <small class="mb-0 ms-2 text-danger">
                        {{ $errors->get('password_confirmation')[0] }}
                    </small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Đăng kí</button>
            </form>
        </div>
    </div>
@endsection

@section('extended-script')
@endsection
