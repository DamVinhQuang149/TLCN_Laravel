@extends('layout.appadmin')

@section('content')
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">

                            <h1>Edit Protype</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>

                                <li class="breadcrumb-item active">Edit Manufacture</li>

                            </ol>

                        </div>

                    </div>

                </div><!-- /.container-fluid -->

            </section>



            <!-- Main content -->

            <section class="content">

                @foreach ($manubyid as $value)
                    <form action="/admin/manufactures/{{ $value->manu_id }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        @method('PUT')

                        <div class="row">

                            <div class="col-md-12">



                                <div class="card card-primary">

                                    <div class="card-header">

                                        <h3 class="card-title">General</h3>



                                        <div class="card-tools">

                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">

                                                <i class="fas fa-minus"></i>

                                            </button>

                                        </div>

                                    </div>

                                    <div class="card-body">

                                        <div class="form-group">

                                            <label for="inputName">Manu_ID</label>

                                            <input readonly value="{{ $value->manu_id }}" type="text" id="inputID"
                                                class="form-control" name="manu_id">

                                        </div>

                                        <div class="form-group">

                                            <label for="inputName">Manu_Name</label>

                                            <input value="{{ $value->manu_name }}" type="text" id="inputName"
                                                class="form-control" name="manu_name">

                                        </div>

                                    </div>

                                    <!-- /.card-body -->

                                </div>

                                <!-- /.card -->

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12">

                                <input type="submit" name="submit" value="Apply change"
                                    class="btn btn-success float-right">

                            </div>

                        </div>

                    </form>
                @endforeach

            </section>

            <!-- /.content -->

        </div>

    </div>
@endsection
