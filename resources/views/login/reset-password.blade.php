@extends('layout.applogin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card h-auto">
                <div class="card-header">
                    <h3>Change Password</h3>
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
                            <input type="email" name="email" class="form-control" placeholder="Input email" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="passwordold" class="form-control" placeholder="Password Old"
                                required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="passwordnew" class="form-control" placeholder="Password New"
                                required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="passwordAgain" class="form-control"
                                placeholder="Password Again" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Apply" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        You don't want to continue?<a href="{{ route('login') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection