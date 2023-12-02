@extends('layout.user')
@section('content')

<body>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
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
                                    <a href="{{ route('forget.password') }}">
                                        <button class="btn btn-primary" style="background-color: #80bb35;">
                                            Đổi mật khẩu
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="{{ route('editprofile.post') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Họ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input required type="text" class="form-control" name="First_name"
                                            value="{{ $user->First_name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tên</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input required type="text" name="Last_name" class="form-control"
                                            value="{{ $user->Last_name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Điện thoại</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input required type="text" name="phone" class="form-control"
                                            value="{{ $user->phone }}">
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Chọn ảnh</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div class="form-group">
                                            <input type="file" name="image" id="fileToUpload">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label for="inputProjectLeader">Image</label>
                                    <input type="file" name="image" id="fileToUpload">
                                </div>


                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <!-- <input type="button" class="btn btn-primary px-4" value="Save Changes"> -->
                                        {{-- <button class="btn btn-primary px-4" style="background-color: #80bb35;"
                                            name="submit">Lưu thay đổi</button> --}}
                                        <input type="submit" name="submit" value="Lưu thay đổi"
                                            class="btn btn-primary px-4" style="background-color: #80bb35;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Chọn ảnh</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <div class="form-group">
                                <input type="file" name="image" id="fileToUpload">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection