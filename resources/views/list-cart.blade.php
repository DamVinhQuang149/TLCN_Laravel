@extends('layout.app')
@section('content')
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
                        <form action="#" method="get">
                            @csrf
                            <div id="change-list-cart">
                                @if (Session::has("Cart") != null)
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-image">ảnh</th>
                                            <th class="product-name">sản phẩm</th>
                                            <th class="product-price">giá</th>
                                            <th class="product-quantity">số lượng</th>
                                            <th class="product-subtotal">tổng giá</th>
                                            <th class="product-remove">Xóa</th>
                                            <th class="product-save">Sửa</th>
                                        </tr>
                                    </thead>
                                    @foreach (Session::get('Cart')->products as $item)
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-image">
                                                <a
                                                    href="{{ route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id]) }}">
                                                    <img width="145" height="145" alt="poster_1_up"
                                                        class="shop_thumbnail"
                                                        src="{{ asset('assets/img/' . $item['productInfo']->pro_image) }}">
                                                </a>
                                            </td>
                                            <td class="product-name" style="max-width: 440px;">
                                                <a
                                                    href="{{ route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id]) }}">
                                                    <strong>{{ $item['productInfo']->name }}</strong>
                                                </a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><strong>{{ number_format($item['price1'])
                                                        }}VND</strong></span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <strong>
                                                        <input id="quanty-item-{{ $item['productInfo']->id }}"
                                                            style="border-color: #000; border-radius: 4px; padding: 5px; width: 40px; text-align: center;"
                                                            type="number" min="1" class="input-text qty text"
                                                            title="Qty" value="{{ $item['quanty'] }}">
                                                    </strong>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">
                                                    <strong>{{ number_format($item['price']) }} VND</strong>
                                                </span>
                                            </td>
                                            <td class="product-remove">
                                                <a title="Save this item" class="product-save" style="text-decoration: none;border:1px solid #000; padding:9px; border-radius:6px"
                                                    onclick="DeleteListItemCart({{ $item['productInfo']->id }})"
                                                    href="javascript:">
                                                    Xóa
                                                </a>
                                            </td>
                                            <td class="product-save">
                                                <a title="Save this item" class="product-save" style="text-decoration: none;border:1px solid #000; padding:9px; border-radius:6px"
                                                    href="javascript:"
                                                    onclick="SaveListItemCart({{ $item['productInfo']->id }})">
                                                    Cập nhật
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    <tr>
                                        <td class="actions" colspan="7">
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn">
                                                    <a style="text-decoration: none;" href="{{ route('view.checkout') }}">
                                                        <i class="fa fa-credit-card"></i> Thanh toán
                                                    </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="cart-collaterals">
                                    <div class="cart_totals col-lg-offset-4">
                                        <table cellspacing="0">
                                            <tbody>
                                                <tr class="order-total">
                                                    <th>Tổng</th>
                                                    <td>
                                                        <strong>
                                                            <span class="amount">
                                                                {{ number_format(Session::get('Cart')->totalPrice) }}
                                                                VND
                                                            </span>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @else
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-image">ảnh</th>
                                            <th class="product-name">sản phẩm</th>
                                            <th class="product-price">giá</th>
                                            <th class="product-quantity">số lượng</th>
                                            <th class="product-subtotal">tổng giá</th>
                                            <th class="product-remove">Xóa</th>
                                            <th class="product-save">Sửa</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class="actions" colspan="7">
                                            <div class="add-to-cart">
                                                <strong>Giỏ hàng của bạn hiện đang trống</strong>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="cart-collaterals">
                                    <div class="cart_totals col-lg-offset-4">
                                        <table cellspacing="0">
                                            <tbody>
                                                <tr class="order-total">
                                                    <th>Tổng</th>
                                                    <td>
                                                        <strong>
                                                            <span class="amount">
                                                                0 VND
                                                            </span>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="pap1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        @foreach ($products as $product)
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img style="width=100px"
                                                    src="{{ asset('assets/img/' . $product->pro_image) }}" alt="">
                                                <div class="product-label">
                                                    <span class="new">BÁN CHẠY</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"></p>
                                                <h3 class="product-name"><a
                                                        href="{{ route('detail.product', ['type_id' => $product->type_id, 'id' => $product->id]) }}">{{
                                                        $product->name }}</a>
                                                </h3>
                                                @if ($product->discount_price > 0)
                                                <h4 class="product-price">
                                                    <del>{{ number_format($product->price) }} VND</del>
                                                </h4>
                                                <h4 class="discount-price">
                                                    {{ number_format($product->discount_price) }} VND
                                                </h4>
                                                @else
                                                <h4 class="discount-price">
                                                    {{ number_format($product->price) }} VND
                                                </h4>
                                                @endif
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to
                                                            wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to
                                                            compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <a onclick="AddCart({{ $product->id }})" href="javascript:">
                                                <div class="add-to-cart">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
                                                        thêm vào giỏ</button>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- /product -->
                                        @endforeach
                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection