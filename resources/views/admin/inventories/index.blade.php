@extends('layout.appadmin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Inventory</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Inventory</li>
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
                    <h3 class="card-title">There are {{ $productAll->count() }} Products </h3>


                    <div class="card-tools">
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
                                    <th style="width: 1%">
                                        Inventory_ID
                                    </th>
                                    <th style="width: 15%">
                                        Product_name
                                    </th>
                                    <th style="width: 5%">
                                        Image
                                    </th>
                                    <th style="width: 10%">
                                        Product_ID
                                    </th>
                                    <th style="width: 10%">
                                        Initial import
                                    </th>
                                    <th class="text-center" style="width: 13%">
                                        Sold_quantity
                                    </th>
                                    <th style="width: 3%">
                                        Remain_quantity
                                    </th>
                                    <th style="width: 6%">
                                        Inventory_Status
                                    </th>
                                    <th style="width: 5%" class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventories as $value)
                                    <tr>
                                        <td style="text-align:center; width:1%">#{{ $value['inventory_id'] }}</td>
                                        <td style="width:15%">{{ $value['product_name'] }}</td>
                                        <td style="width:5%">
                                            <a rel="stylesheet" href="/admin/products/{{ $value->product_id }}/edit">
                                                <img style="width:50px"
                                                    src="{{ asset('assets/img/' . $value['product_image']) }}"alt="">
                                            </a>
                                        </td>
                                        <td style="width:10%" class="text-center">#{{ $value['product_id'] }}</td>
                                        <td style="width:8%" class="text-center">{{ $value['import_quantity'] }}</td>
                                        <td style="width:13%" class="text-center">{{ $value['sold_quantity'] }}</td>
                                        <td style="width:3%" class="text-center">{{ $value['remain_quantity'] }}</td>
                                        <td style="width:6%" class="text-center">{{ $value['inventory_status'] }}</td>
                                        <td style="width:5%" class="project-actions text-right">
                                            <form action="inventories/{{ $value->inventory_id }}/edit" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="btn btn-info btn-sm" style="margin-bottom: 10px;">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Update
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        {{ $inventories->render('/admin/pagination') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
