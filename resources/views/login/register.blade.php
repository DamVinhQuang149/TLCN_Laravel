@extends('layout.applogin')

@section('content')
    <div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card h-auto">
				<div class="card-header">
					<h3>Đăng ký</h3>
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
						@method('POST')
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="First_name" class="form-control" placeholder="Họ" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="Last_name" class="form-control" placeholder="Tên" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control" placeholder="Tài khoản" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="passwordAgain" class="form-control" placeholder="Nhập lại mật khẩu" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control" placeholder="Email" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-phone"></i></span>
							</div>
							<input type="phone" name="phone" class="form-control" placeholder="Số điện thoại" required>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Đăng ký" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">

					<div class="d-flex justify-content-center links">
						Đã có tài khoản?<a href="login">Đăng nhập</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="forget-password">Quên mật khẩu?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection