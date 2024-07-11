@extends('layout.appadmin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products Flash Sales</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
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

                    <h3 class="card-title">There are {{ $all->count() }} Products Flash Sales</h3>


                    <div class="card-tools">
                        <a class="btn btn-sm bg-green" href="flashsales/create">
                            <i class="fas fa-plus"></i>
                            Add
                        </a>
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
                                    <th style="width: 15%" class="text-center">
                                        FlashSales ID
                                    </th>
                                    <th style="width: 15%" class="text-center">
                                        Product Name
                                    </th>
                                    <th style="width: 5%" class="text-center">
                                        Image
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Product ID
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Sales Price
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Sales Rate
                                    </th>
                                    <th style="width: 15%" class="text-center">
                                        Start Date
                                    </th>
                                    <th class="text-center" style="width: 15%">
                                        End Date
                                    </th>

                                    <th style="width: 5%" class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($flashsales as $value)
                                    @foreach ($products as $pro)
                                        @if ($value->product_id === $pro->id)
                                            <tr>
                                                <td style="text-align:center; width:15%">#{{ $value['id'] }}</td>
                                                <td style="width:15%" class="text-center">{{ $pro['name'] }}</td>
                                                <td style="width:5%">
                                                    <a rel="stylesheet" href="/admin/products/{{ $value->product_id }}/edit">
                                                        <img style="width:50px"
                                                            src="{{ asset('assets/img/' . $pro['pro_image']) }}"alt="">
                                                    </a>
                                                </td>
                                                <td style="width:10%" class="text-center">#{{ $value['product_id'] }}</td>
                                                <td style="width:10%" class="text-center">
                                                    {{ number_format($pro['discount_price']) }}đ</td>
                                                <td style="width:10%" class="text-center">
                                                    {{ (1 - $pro['discount_price'] / $pro['price']) * 100 }}%</td>
                                                <td style="width:15%" class="text-center">{{ $value['start_date'] }}</td>
                                                <td style="width:15%" class="text-center">{{ $value['end_date'] }}</td>
                                                <td style="width:5%" class="project-actions text-right">
                                                    <form action="flashsales/{{ $value->id }}/edit" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('GET')
                                                        <button type="submit" class="btn btn-info btn-sm"
                                                            style="margin-bottom: 10px;">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Update
                                                        </button>
                                                    </form>

                                                    <form action="flashsales/{{ $value->id }}" method="POST"
                                                        enctype="multipart/form-data">

                                                        @csrf

                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            style="margin-top:6px" onclick="confirmDelete(event)">

                                                            <i class="fas fa-trash"></i> Delete

                                                        </button>

                                                    </form>
                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        {{ $flashsales->render('/admin/pagination') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
