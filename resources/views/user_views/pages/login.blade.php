@extends('/user_views/master')

@section('title')
    <title>Đăng nhập</title>
@endsection

@section('content')
    <div id="content" class="content-area container py-4" role="main">
        <div class="row mx-auto">
            <form action="{{ route('user.login') }}" method="POST" class="col-12 col-md-6 mx-auto">
                <p class="h3 fw-bold">Form Đăng Nhập</p>
                @csrf
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
                    <a href="/dang-ki" class="text-decoration-none">Bạn chưa có tài khoản?</a>
                </div>
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
        </div>
    </div>
@endsection

@section('extended-script')
@endsection
