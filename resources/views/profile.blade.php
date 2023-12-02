@extends('layout.user')
@section('content')
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
    <div class="container">
        <div class="main-body" style="margin-top: 20px;">
            <form action="">
                <div class="row gutters-sm justify-content-center">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if($user->image)
                                        <img src="{{ asset('assets/img/' . $user->image) }}" class="rounded-circle" width="150">
                                    @else
                                        <img src="{{ asset('assets/img/avatar3.jpg') }}" class="rounded-circle" width="150">
                                    @endif
                                    <div class="mt-3">
                                        <h4>{{ $user->First_name }} {{ $user->Last_name }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Họ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->First_name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tên</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->Last_name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tên tài khoản</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->username }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Điện thoại</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->phone }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Quyền</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->role->role_name }}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <a style="background-color: #f75e00;" class="btn btn-reorder"
                                            href="{{ route('editprofile', ['user_id' => $user->user_id]) }}"><strong>Sửa</strong>
                                            <i class="fa fa-pencil"></i></a>
                                        <a style="background-color: #80bb35;" class="btn btn-reorder"
                                            href="orders.php"><strong>Xem đơn hàng</strong> <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
