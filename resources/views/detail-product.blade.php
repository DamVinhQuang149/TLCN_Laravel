@extends('layout.app')
@section('content')
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    </head>

    <body>
        <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-content-right">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-images">
                                        <div class="product-main-img">
                                            <img src="{{ asset('assets/img/' . $probyid['pro_image']) }}" alt=""
                                                width="70%">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="product-inner">

                                        <h2 class="product-name"><strong>Tên sản phẩm: {{ $probyid['name'] }}</strong></h2>
                                        <ins class="product-inner-price">Loại sản phẩm: {{ $probyid['type_name'] }}</ins>
                                        <br>
                                        <ins class="product-inner-price">Nhà sản xuất: {{ $probyid['manu_name'] }}</ins>
                                        <div style="margin-top:10px; color:#80bb35">
                                            <h5><del><strong>{{ number_format($probyid['price']) }} VND</strong></del></h5>
                                        </div>
                                        <div class="product-inner-price">
                                            <h4><strong>{{ number_format($probyid['discount_price']) }} VND</>
                                                </strong></h4>
                                        </div>
                                        <div class="product-inner-price">
                                            <div class="quantity">
                                                <input id="quanty-item-{{ $probyid->id }}" type="number"
                                                    class="input-text qty text" title="Qty" probyid="1" size="1"
                                                    name="quantity" min="1" step="1" value="1">
                                            </div>
                                            <button onclick="AddQuantyCart({{ $probyid->id }})" type="submit"
                                                name="submit">thêm vào giỏ</button>
                                        </div>

                                        <div role="tabpanel">
                                            <ul class="product-tab" role="tablist">
                                                <li role="presentation" class="active"><a href="#home"
                                                        aria-controls="home" role="tab" data-toggle="tab">Mô tả</a></li>
                                                <li role="presentation"><a href="#profile" aria-controls="profile"
                                                        role="tab" data-toggle="tab">Đánh giá</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                    <h2>Mô tả sản phẩm</h2>
                                                    <p>{{ $probyid->description }}</p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                                    <h2>Đánh giá</h2>
                                                    <div class="submit-review">
                                                        <p><label for="name">Tên</label> <input name="name"
                                                                type="text"></p>
                                                        <p><label for="email">Email</label> <input name="email"
                                                                type="email"></p>
                                                        <div class="rating-chooser">
                                                            <p>Đánh giá</p>

                                                            <div class="rating-wrap-post">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <p><label for="review">Bình luận</label>
                                                            <textarea name="review" id="" cols="30" rows="10"></textarea>
                                                        </p>
                                                        <p><input type="submit" value="Gửi"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr size="5px" align="center" color=#e6e9ee />
                            <div class="col-md-12">
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
                                                                src="{{ asset('assets/img/' . $product['pro_image']) }}"
                                                                alt="">
                                                            <div class="product-label">
                                                                <span class="new">MỚI</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category"></p>
                                                            <h3 class="product-name"><a
                                                                    href="{{ route('detail.product', ['type_id' => $product->type_id, 'id' => $product->id]) }}">{{ $product['name'] }}</a>
                                                            </h3>
                                                            <h5 class="product-price">
                                                                <strong><del>{{ number_format($product->price) }}
                                                                        VND</del></strong>
                                                            </h5>
                                                            <h4 class="discount-price">
                                                                <strong>
                                                                    {{ number_format($product->discount_price) }}
                                                                    VNĐ</strong>
                                                            </h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i
                                                                        class="fa fa-heart-o"></i><span
                                                                        class="tooltipp">add to
                                                                        wishlist</span></button>
                                                                <button class="add-to-compare"><i
                                                                        class="fa fa-exchange"></i><span
                                                                        class="tooltipp">add to
                                                                        compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                                        class="tooltipp">quick view</span></button>
                                                            </div>
                                                        </div>
                                                        <a
                                                            href="addcart.php?id=<?php echo $product['id']; ?>&type_id=<?php echo $product['type_id']; ?>">
                                                            <div class="add-to-cart">
                                                                <button class="add-to-cart-btn"><i
                                                                        class="fa fa-shopping-cart"></i> THÊM VÀO
                                                                    GIỎ</button>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
