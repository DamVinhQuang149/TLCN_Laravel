@extends('layout.user')
@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('changeimage.post', ['user_id' => $user->user_id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">User_ID</label>
                                    <input readonly value="{{ $user->user_id }}" type="text" id="inputID" class="form-control" name="user_id">
                                </div>
                                <div class="form-group">
                                    <img style="width:50px" src="{{ asset('assets/img/' . $user->image) }}" alt="">
                                    <input type="file" name="image" id="fileToUpload">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" name="submit" value="Lưu ảnh" style="background-color: #80bb35;" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection