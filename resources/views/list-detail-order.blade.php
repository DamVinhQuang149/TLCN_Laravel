@extends('layout.app')
@section('content')
<head>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style1.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css">
</head>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="get" action="#">
                                @csrf
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            {{-- <th class="order-id"></th>
                                            <th class="product-thumbnail">SẢN PHẨM</th>
                                            <th class="product-thumbnail">GIẢM GIÁ</th>
                                            <th class="product-action" style="width:3%">
                                                <button class="btn btn-info">
                                                    <a style="text-decoration: none;color:#fff;" href="{{ route('list.order') }}">
                                                        <i class="fa fa-arrow-left"></i> QUAY LẠI
                                                    </a>
                                                </button>
                                            </th> --}}
                                            <th style="width: 5%" class="text-center">
                                                MÃ ĐƠN HÀNG
                                            </th>
                                            <th style="width: 10%" class="text-center">
                                                ẢNH
                                            </th>
                                            <th style="width: 25%" class="text-center">
                                                TÊN SẢN PHẨM
                                            </th>
                                            <th style="width: 15%" class="text-center">
                                                LOẠI SẢN PHẨM
                                            </th>
                                            <th class="text-center">
                                                GIÁ
                                            </th>
                                            <th style="width: 10%" class="text-center">
                                                SỐ LƯỢNG
                                            </th>
                                            <th class="text-center">
                                                TỔNG GIÁ
                                            </th>
                                            <th class="product-action" style="width:3%">
                                                <button class="btn btn-info">
                                                    <a style="text-decoration: none;color:#fff;" href="{{ route('list.order') }}">
                                                        <i class="fa fa-arrow-left"></i> QUAY LẠI
                                                    </a>
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderdetails as $value)
                                            <tr>
                                                <td class="text-center" style="width: 5%">{{ $value->order_id }}</td>
                                                <td><img style="width:102px" class="text-center"
                                                        src="{{ asset('assets/img/' . $value->product_image) }}">
                                                </td>
                                                <td class="text-center" style="width: 5%">{{ $value->product_name }}</td>
                                                <td class="text-center" style="width: 5%">{{ $value->type_name }}</td>
                                                <td class="text-center" style="width: 15%">{{ number_format($value->discount_price, 0, ',', '.') }} đ</td>
                                                <td class="text-center">x {{ $value->product_quantity }}</td>
                                                <td style="width: 20%">{{ number_format($value->cost, 0, ',', '.') }} đ</td>
                                                <td style="width: 20%"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- <tbody>
                                        @foreach ($orderdetails as $item)
                                        <tr>
                                            <td class="order-id"><strong>
                                                    {{ $item->order_id }}
                                                </strong></td>
                                            <td class="product-thumbnail">
                                                <div class="product-thumbnail-item">
                                                    <img style="width:102px" src="{{ asset('assets/img/' . $item->product_image) }}"
                                                        alt="{{ $item->product_name }}">
                                                    <div class="product-thumbnail-info">
                                                        <h5>
                                                            <a href="{{ route('detail.product', ['type_id' => $item->type_id, 'id' => $item->id]) }}">
                                                                {{ $item->product_name }}
                                                            </a>
                                                        </h5>
                                                        <h5>
                                                            {{ number_format($item->discount_price, 0, ',', '.') }} đ
                                                        </h5>
                                                        @php
                                                            $totalPrice = $item->discount_price * $item->product_quantity;
                                                        @endphp
                                                        
                                                        <h5>
                                                            <p>Số lượng: x
                                                                {{ $item->product_quantity }}
                                                            </p>
                                                        </h5>
                                                        <hr style="border-top:1px solid gray;">
                                                        <h5>
                                                            <p>Tổng:
                                                                {{ number_format($totalPrice, 0, ',', '.') }} đ
                                                            </p>
                                                        </h5>
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-action">
                                                <strong>
                                                    <p>Giảm giá:
                                                        @if ($item->discount_price > 100)
                                                            {{ number_format(-$item->discount_price, 0, ',', '.') }}
                                                        @else
                                                            {{ number_format(-(($item->coupon_discount * ($item->total / (1 - $item->coupon_discount / 100))) / 100), 0, ',', '.') }}
                                                        @endif
                                                </strong>
                                            </td>
                                            <td class="product-action">
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody> --}}
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection