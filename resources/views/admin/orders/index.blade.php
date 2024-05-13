@extends('layout.appadmin')
@section('content')
    <style>
        .form-search {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .input-select {
            margin-right: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input {
            margin-right: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-btn {
            padding: 8px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-btn:hover {
            background-color: #0056b3;
        }

        /* Tùy chỉnh cho các nút tương tác */
        .btn {
            margin-right: 10px;
        }

        .btn:last-child {
            margin-right: 0;
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </div>
                    <form action="/admin/orders/search" method="GET">
                        @csrf
                        <input name="keyword" class="input" placeholder="Tìm kiếm">
                        <button type="submit" class="search-btn">Search</button>
                    </form>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Orders</h3>

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
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 5%">
                                    Order_id
                                </th>

                                <th style="width: 5%">
                                    User_id
                                </th>
                                <th style="width: 5%">
                                    Order_code
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Address
                                </th>
                                <th style="width: 10%">
                                    Phone
                                </th>
                                <th style="width: 5%">
                                    Total
                                </th>
                                <th style="width: 15%" class="text-center">
                                    Note
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Checkout
                                </th>
                                <th style="width: 7%" class="text-center">
                                    Status
                                </th>
                                <th style="width: 5%">
                                    Date_create
                                </th>
                                <th style="width: 1%" class="text-center">
                                    Details
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $value)
                                <tr>
                                    <td class="text-center" style="width: 5%">#{{ $value->order_id }}</td>

                                    <td class="text-center" style="width: 5%">#{{ $value->user_id }}</td>
                                    <td class="text-center" style="width: 5%">{{ $value->order_code }}</td>
                                    <td class="text-center" style="width: 10%">{{ $value->address }}</td>
                                    <td style="width: 10%">{{ $value->phone }}</td>
                                    <td style="width: 9%">Mã giảm giá:
                                        @if ($value->coupon_discount > 100)
                                            {{ number_format(-$value->coupon_discount, 0, ',', '.') }}
                                        @else
                                            {{ number_format(-(($value->coupon_discount * ($value->total / (1 - $value->coupon_discount / 100))) / 100), 0, ',', '.') }}
                                        @endif đ
                                        <div></div>
                                        Tổng tiền: {{ number_format($value->total, 0, ',', '.') }} đ
                                    </td>
                                    <td class="text-center" style="width: 15%">{{ $value->note }}</td>
                                    <td style="width: 10%">
                                        @if ($value->checkout == 0)
                                            {{ 'Chuyển khoản ngân hàng' }}
                                        @else
                                            {{ 'Thanh toán khi nhận hàng' }}
                                        @endif
                                    </td>
                                    <td class="text-center" style="width: 7%">

                                        @foreach ($status as $stt)
                                            @if ($stt['status'] == $value['status'])
                                                {{ $stt->status_name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td style="width: 5%">{{ $value->created_at }} </td>
                                    <td class="project-actions text-right" style="width:1%">
                                        <button class="btn btn-print"
                                            style="background-color: green; margin-top:6px; margin-bottom:6px">
                                            <a style="text-decoration: none; color: #fff;"
                                                href="{{ url('/admin/invoices/' . $value->order_id) }}" target="_blank">
                                                <i class="fa fa-print"></i> Print
                                            </a>
                                        </button>
                                        <form action="{{ route('orderdetails.show', $value->order_id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-sm bg-green" style="margin-bottom: 10px;">
                                                <i class="fa fa-eye">
                                                </i>
                                                View
                                            </button>
                                        </form>
                                        <form action="{{ route('orders.edit', $value->order_id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-info btn-sm">
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
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        {{ $orders->render('/admin/pagination') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
