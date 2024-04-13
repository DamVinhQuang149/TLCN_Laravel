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

                            <h1>Edit Advertisements</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>

                                <li class="breadcrumb-item active">Edit Advertisements</li>

                            </ol>

                        </div>

                    </div>

                </div><!-- /.container-fluid -->

            </section>



            <!-- Main content -->

            <section class="content">

                {{-- @foreach ($advertisements_id as $advertisements_id) --}}

                    <form action="/admin/advertisements/{{ $advertisements_id->id }}" method="POST" enctype="multipart/form-data">

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

                                            <label for="inputName">ID</label>

                                            <input readonly value="{{ $advertisements_id->id }}" type="text" id="inputID"

                                                class="form-control" name="type_id">

                                        </div>

                                        <div class="form-group">

                                            <label for="inputName">Title</label>

                                            <input value="{{ $advertisements_id->title }}" type="text" id="inputName"

                                                class="form-control" name="title">

                                        </div>

                                        <div class="form-group">

                                            <label for="inputDescription">Content</label>

                                            <textarea name="content" id="summernote" class="form-control" rows="4">{{ $advertisements_id->content }}</textarea>

                                        </div>

                                        <div class="form-group">

                                            <label for="inputName">Offer</label>

                                            <input value="{{ $advertisements_id->offer }}" type="text" id="inputName"

                                                class="form-control" name="offer">

                                        </div>

                                        <div class="form-group">

                                            <label for="inputName">Contact_info</label>

                                            <input value="{{ $advertisements_id->contact_info }}" type="text" id="inputName"

                                                class="form-control" name="contact_info">

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

                {{-- @endforeach --}}

            </section>

            <!-- /.content -->

        </div>

    </div>

@endsection

