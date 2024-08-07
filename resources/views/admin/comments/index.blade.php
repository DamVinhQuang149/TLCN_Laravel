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
                    <div style="overflow-x: auto;">
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
                                    @if ($comment->reply_to_comment_id == '')
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
                                            <td style="width: 15%">
                                                @foreach ($allcomment as $item)
                                                    @if ($comment->comm_id == $item->reply_to_comment_id)
                                                        {{ $item->comment }}
                                                    @endif
                                                @endforeach

                                            </td>
                                            {{-- <td class="project_progress text-center" style="width: 10%">
                                                @if ($comment->isApproved == 1)
                                                    Approved
                                                @else
                                                    Pending Approval
                                                @endif

                                            </td> --}}
                                            <td class="project-actions" style="width: 5%">
                                                @if ($comment->isApproved == 0)
                                                    <form action="/admin/comment/{{ $comment->comm_id }}/approve" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" value="1" name="isApproved">
                                                        <button type="submit" class="btn btn-info btn-sm"
                                                            style="margin-bottom: 10px;">

                                                            Approved
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="/admin/comment/{{ $comment->comm_id }}/approve" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" value="0" name="isApproved">
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            style="margin-bottom: 10px;">
                                                            Cancel
                                                        </button>
                                                    </form>
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
                                                    <button type="submit" class="btn btn-info btn-sm"
                                                        style="margin-bottom: 10px;">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Reply comment
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
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        {{ $comments->render('/admin/pagination') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
