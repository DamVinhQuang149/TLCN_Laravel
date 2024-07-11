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
                                <div style="overflow-x: auto;">
                                    <table cellspacing="0" class="shop_table cart">
                                        <thead>
                                            <tr></tr>
                                            <th style="width: 25%" class="text-center">
                                                TÊN SẢN PHẨM
                                            </th>
                                            <th style="width: 10%" class="text-center">
                                                ẢNH
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
                                                    <a style="text-decoration: none;color:#fff;"
                                                        href="{{ route('list.order') }}">
                                                        <i class="fa fa-arrow-left"></i> QUAY LẠI
                                                    </a>
                                                </button>
                                            </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderdetails as $value)
                                                <tr>
                                                    <td class="text-center" style="width: 5%">
                                                        <strong>{{ $value->product_name }}</strong>
                                                    </td>
                                                    <td><a
                                                            href="/product/type_id={{ $value->type_id }}&id={{ $value->product_id }}"><img
                                                                style="width:102px" class="text-center"
                                                                src="{{ asset('assets/img/' . $value->product_image) }}">
                                                        </a>
                                                    </td>

                                                    <td class="text-center" style="width: 5%">
                                                        <strong>{{ $value->type_name }}</strong>
                                                    </td>
                                                    <td class="text-center" style="width: 15%">
                                                        <strong>{{ number_format($value->discount_price, 0, ',', '.') }}
                                                            đ</strong>
                                                    </td>
                                                    <td class="text-center"><strong>x
                                                            {{ $value->product_quantity }}</strong>
                                                    </td>
                                                    <td style="width: 20%">
                                                        <strong>{{ number_format($value->cost, 0, ',', '.') }} đ</strong>
                                                    </td>
                                                    <td style="width: 20%"></td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="7" style="text-align: left;">
                                                    <strong>Địa chỉ: {{ $value->address }}</strong> <br>
                                                    <strong>Phí vận chuyển:
                                                        {{ number_format($value->shipping_fee, 0, ',', '.') }} đ</strong>
                                                    <br>
                                                    <strong>
                                                        Đã giảm giá:
                                                        @if ($value->coupon_discount > 100)
                                                            {{ number_format(-$value->coupon_discount, 0, ',', '.') }}
                                                        @else
                                                            {{ number_format(-(($value->coupon_discount * ($value->total / (1 - $value->coupon_discount / 100))) / 100), 0, ',', '.') }}
                                                        @endif đ
                                                    </strong> <br>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
