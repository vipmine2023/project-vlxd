<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('/img/homepage/favicon.ico') }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>VLXD - Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
</head>

<body>
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @endif

    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">

                            <div class="card-body">

                              <div class="d-flex justify-content-center pt-4">
                                <a href="index.html" class="align-items-center w-auto text-center">
                                    <img src="{{ asset('user/image/logo.png') }}" width="80" height="80"
                                        alt="" class="rounded-circle"><br>
                                    <p class="fw-bold h2 mt-2" style="color: blue">Đăng nhập</p>
                                </a>
                            </div><!-- End Logo -->

                                <form class="row g-3 needs-validation" novalidate
                                    action="{{ route('admin.checkLogin') }}" method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="email" class="form-control" id="email" placeholder="Vui lòng nhập email"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Vui lòng nhập mật khẩu"
                                            required>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
    </main><!-- End #main -->

    <link href="{{ asset('tbk/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tbk/css/style.css') }}" rel="stylesheet">

</body>

</html>
