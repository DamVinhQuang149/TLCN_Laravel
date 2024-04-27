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

                            <h1>Edit Inventory</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>

                                <li class="breadcrumb-item active">Edit Inventory's Products</li>

                            </ol>

                        </div>

                    </div>

                </div><!-- /.container-fluid -->

            </section>



            <!-- Main content -->

            <section class="content">

                @foreach ($inventories as $value)
                    <form action="/admin/inventories/{{ $value->inventory_id }}" method="POST"
                        enctype="multipart/form-data">

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

                                            <label for="inputName">Inventory ID</label>

                                            <input readonly value="{{ $value->inventory_id }}" type="text" id="inputID"
                                                class="form-control" name="manu_id">

                                        </div>

                                        <div class="form-group">

                                            <label for="inputName">Remain quantity</label>

                                            <input value="{{ $value->import_quantity }}" type="text" class="form-control"
                                                name="remain_quantity">

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
