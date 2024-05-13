@extends('layout.appadmin')

@section('content')
    <!-- Site wrapper -->

    <div class="wrapper">

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">

                            <h1>Edit Comments</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>

                                <li class="breadcrumb-item active">Edit Comments</li>

                            </ol>

                        </div>

                    </div>

                </div><!-- /.container-fluid -->

            </section>



            <!-- Main content -->

            <section class="content">

                @foreach ($comment as $comment)
                    <form action="/admin/comments/{{ $comment->comm_id }}" method="POST" enctype="multipart/form-data">

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

                                            <label for="inputID">ID</label>

                                            <input readonly value="{{ $comment->comm_id }}" type="text" id="inputID"
                                                class="form-control" name="id">

                                        </div>
                                        <div class="form-group">

                                            <label for="inputID">ID Product</label>

                                            <input readonly value="{{ $comment->id }}" type="text" id="inputID"
                                                class="form-control" name="product_id">

                                        </div>

                                        <div class="form-group">

                                            <label for="inputName">Name</label>

                                            <input readonly value="{{ $comment->name }}" type="text" id="inputName"
                                                class="form-control" name="name">

                                        </div>
                                        <div class="form-group">

                                            <label for="inputProjectLeader">Image</label>

                                            <img style="width:50px" src="{{ asset('assets/img/' . $comment->pro_image) }}"
                                                alt="">

                                        </div>

                                        <div class="form-group">

                                            <label for="inputDescription" class="comment-label">
                                                <span class="username"
                                                    style="font-weight: bold; color: blue;">{{ $comment->First_name }}
                                                    {{ $comment->Last_name }}</span> commented
                                            </label>

                                            <textarea readonly name="comment" class="form-control" rows="4">{{ $comment->comment }}</textarea>

                                        </div>

                                        <div class="form-group">

                                            <label for="inputDescription">Reply To Comment</label>

                                            <textarea placeholder="reply to comment" name="reply-comment" class="form-control" rows="4"></textarea>

                                        </div>

                                        <div class="form-group">
                                            <label for="inputType">Status</label>
                                            <select id="inputType" class="form-control custom-select" name="status"
                                                required>
                                                <option selected disabled>Select one</option>
                                                <option value="1">Approved</option>
                                                <option value="0">Pending Approved</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>

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

        </div>
    @endsection
