@include('admin.head') 
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<body class="hold-transition login-page">
    <div class="login-container">
        <div class="image-container">
            <img src="/template/images/bgre.png"
                alt="Admin Image">
        </div>
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Đăng Kí</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Đăng ký để bắt đầu phiên làm việc của bạn</p>

                    @include('admin.alert')
                    <form action="/admin/users/register" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Tên của bạn">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Xác nhận lại mật khẩu">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-8"> --}}
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        @csrf
                    </form>

                    {{-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Đăng nhập bằng cách sử dụng Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Đăng nhập bằng cách sử dụng Google+
        </a>
      </div> --}}
                    <!-- /.social-auth-links -->

                    {{-- <p class="mb-1">
        <a href="forgot-password.html">Tôi quên mật khẩu</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Đăng ký thành viên mới</a>
      </p> --}}
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        @include('admin.footer')
    </div>
</body>
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
