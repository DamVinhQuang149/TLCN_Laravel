@extends('layout.appadmin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Comment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Comment</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Comment</h3>

                    <div class="card-tools">
                        {{-- <a class="btn btn-sm bg-green" href="comments/create">
                            <i class="fas fa-plus"></i>
                            Add
                        </a> --}}
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 10%">
                                    comm_id
                                </th>
                                <th style="width: 15%">
                                    Name
                                </th>
                                <th style="width: 5%">
                                    Image
                                </th>
                                <th style="width: 15%">
                                    Product_name
                                </th>
                                <th style="width: 15%">
                                    Comment
                                </th>
                                <th style="width: 15%">
                                    Reply Comment
                                </th>
                                <th style="width: 10%">
                                    Status
                                </th>
                                <th style="width: 10%">
                                    Created_at
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td style="width: 10%">#{{ $comment->comm_id }}</td>

                                    <td style="width: 15%">{{ $comment->First_name }} {{ $comment->Last_name }}</td>
                                    <td style="width: 5%">
                                        <img style="width:50px"src="{{ asset('assets/img/' . $comment->pro_image) }}"
                                            alt="">
                                    </td>
                                    <td class="project_progress" style="width: 15%">
                                        {{ $comment->name }}
                                    </td>
                                    <td style="width: 15%">{{ $comment->comment }}</td>
                                    <td class="text-center" style="width: 15%"></td>
                                    <td class="project_progress text-center" style="width: 10%">
                                        @if ($comment->isApproved == 1)
                                            Approved
                                        @else
                                            Pending Approval
                                        @endif

                                    </td>
                                    <td class="project_progress text-center" style="width: 10%">
                                        {{ $comment->created_at }}
                                    </td>

                                    <td class="project-actions text-right" style="width: 5%">
                                        <form action="comments/{{ $comment->comm_id }}/edit" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-info btn-sm" style="margin-bottom: 10px;">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Update
                                            </button>
                                        </form>
                                        <form action="comments/{{ $comment->comm_id }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="confirmDelete(event)">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        {{ $comments->render('/admin/pagination') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
