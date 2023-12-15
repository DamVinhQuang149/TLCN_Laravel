
@extends('layout.applogin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card h-auto" >
                <div class="card-header">
                    <h3>Đăng nhập quản trị viên</h3>
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
                            <input type="text" class="form-control" placeholder="Tài khoản" name="username" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Đăng nhập" class="btn float-right login_btn" style="width:33%" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
	