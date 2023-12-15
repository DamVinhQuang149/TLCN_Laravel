@extends('layout.applogin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card h-auto">
                <div class="card-header">
                    <h3 style="padding-top:30px;">Quên mật khẩu</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><a href="https://www.facebook.com/" target="_blank" style="color:#FFC312"><i class="fab fa-facebook-square"></i></a></span>
                        <span><a href="https://www.google.com/" target="_blank" style="color:#FFC312"><i class="fab fa-google-plus-square"></i></a></span>
                        <span><a href="https://twitter.com/" target="_blank" style="color:#FFC312"><i class="fab fa-twitter-square"></i></a></span>
                    </div>
                </div>
                <div class="mt-5">
                    @if ($errors->any())
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Gửi" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">

                    <div class="d-flex justify-content-center links">
                        Bạn muốn quay lại?<a href="{{ route('login') }}">Quay lại đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection