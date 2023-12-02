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
                                            <th class="order-id" style="width:5%">MÃ ĐƠN HÀNG</th>
                                            <!-- <th class="product-thumbnail" style="width:13%">SẢN PHẨM</th> -->
                                            <th class="product-cost">THÀNH TIỀN</th>
                                            <th class="product-coupon">ĐÃ GIẢM GIÁ</th>
                                            <th class="product-address">ĐỊA CHỈ</th>
                                            <th class="product-phone">SỐ ĐIỆN THOẠI</th>
                                            <th class="product-checkout">THANH TOÁN</th>
                                            <th class="product-status">TÌNH TRẠNG</th>
                                            <th class="product-date-create">NGÀY ĐẶT HÀNG</th>
                                            <th class="product-action" style="width:3%">HÀNH ĐỘNG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listorder as $item)
                                            
                                        <tr>
                                            <td class="order-id">
                                                <strong>
                                                    {{ $item->order_id }}
                                                </strong>
                                            </td>

                                            <td class="product-cost">
                                                <strong>
                                                    {{ number_format($item->total, 0, ',', '.')}}đ
                                                </strong>
                                            </td>
                                            <td class="product-coupon">
                                                <strong>
                                                    @if ($item->coupon_discount > 100)
                                                        {{ number_format(-$item->coupon_discount, 0, ',', '.') }}
                                                    @else
                                                        {{ number_format(-(($item->coupon_discount * ($item->total / (1 - $item->coupon_discount / 100))) / 100), 0, ',', '.') }}
                                                    @endif đ
                                                </strong>
                                            </td>
                                            <td class="product-address">
                                                <strong>
                                                    {{ $item->address }}
                                                </strong>
                                            </td>
                                            <td class="product-phone">
                                                <strong>
                                                   {{ $item->phone }}
                                                </strong>
                                            </td>
                                            <td class="product-checkout">
                                                <strong>
                                                    @if ($item->checkout == 0)
                                                        Chuyển khoản ngân hàng
                                                    @else
                                                        Thanh toán khi nhận hàng
                                                    @endif
                                                </strong>
                                            </td>
                                            <td class="product-status">
                                                <strong>
                                                    @foreach ($status as $stt)
                                                    @if ($stt['status'] == $item['status'])
                                                        {{ $stt->status_name }}
                                                    @endif
                                                    @endforeach
                                                </strong>
                                            </td>
                                            <td class="product-date-create">
                                                <strong>
                                                    {{ $item->created_at }}
                                                </strong>
                                            </td>
                                            <td class="product-action">
                                                <button class="btn btn-info"
                                                    style="margin-bottom:5px;background-color:#FE9705;border-color:#FE9705">
                                                    <a style="text-decoration: none; color:#fff;"
                                                        href="{{ route('list.detailorder', $item->order_id) }}">
                                                        <i class="fa fa-pencil"></i> XEM CHI TIẾT
                                                    </a>
                                                </button>
                                                @if ($item->status == 4)
                                                <button class="btn btn-received">
                                                    <a style="text-decoration: none; color:#fff;"
                                                        href="./received.php?order_id=">
                                                        <i class="fa fa-check"></i> ĐÃ NHẬN HÀNG
                                                    </a>
                                                </button>
                                                @endif
                                                @if ($item->status == 1 || $item->status == 5 || $item->status == 6)
                                                <button class="btn btn-reorder" style="background-color: #80bb35">
                                                    <a style="text-decoration: none;color:#fff;"
                                                        href="{{ route('reset.order', $item->order_id) }}">
                                                        <i class="fa fa-refresh"></i> ĐẶT HÀNG LẠI
                                                    </a>
                                                </button>
                                                @endif
                                                @if ($item->status == 0)
                                                <button class="btn btn-reorder" style="background-color:red;">
                                                    <a style="text-decoration: none;color:#fff;"
                                                        href="{{ route('canceled.order', ['order_id' => $item->order_id]) }}">
                                                        <i class="fa fa-trash-o"></i> HỦY ĐƠN HÀNG
                                                    </a>
                                                </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </form>
                            <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                                {{ $listorder->render('/admin/pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection