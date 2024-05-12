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
                                    <div class="product-inner" style="font-weight:600">

                                        <h2 class="product-name" style="color: #FE9705"><strong>
                                                {{ $probyid['name'] }}</strong></h2>
                                        <ins class="product-inner-price">Loại sản phẩm: {{ $probyid['type_name'] }}</ins>
                                        <br>
                                        <ins class="product-inner-price">Nhà sản xuất: {{ $probyid['manu_name'] }}</ins>
                                        <br>
                                        <div class="remain-quantity">Tồn kho: {{ $inventories['remain_quantity'] }}</div>
                                        <div style="margin-top:10px; color:#fe9705">
                                            <h5><del><strong>{{ number_format($probyid['price']) }} VND</strong></del></h5>
                                        </div>
                                        <div class="product-inner-price">
                                            <h4><strong>{{ number_format($probyid['discount_price']) }} VND</>
                                                </strong></h4>
                                        </div>
                                        <div class="product-inner-price">
                                            @if ($inventories->remain_quantity)
                                                <div class="quantity">
                                                    <input id="quanty-item-{{ $probyid->id }}" type="number"
                                                        class="input-text qty text" title="Qty" probyid="1"
                                                        size="1" name="quantity" min="1"
                                                        max={{ $inventories->remain_quantity }} step="1"
                                                        value="1">
                                                </div>

                                                <button class="add-to-card-detail"
                                                    onclick="AddQuantyCart({{ $probyid->id }})" type="submit"
                                                    name="submit">thêm vào giỏ hàng</button>
                                            @else
                                                <button class="out-of-stock-detail"> HẾT HÀNG</button>
                                            @endif

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
                                                    <h2>Đánh giá sản phẩm</h2>
                                                    @if (auth()->check())
                                                        <form>

                                                            <div class="submit-review">
                                                                {{-- <p><label for="name">{{ Auth::user()->First_name }} {{ Auth::user()->Last_name }}</label> <input name="name"
                                                                    type="text"></p>
                                                            <p><label for="email">Email</label> <input name="email"
                                                                    type="email"></p> --}}
                                                                <input type="hidden" class="product_id_comment"
                                                                    value="{{ $probyid->id }}">
                                                                <div class="rating-chooser" id="star_rating">

                                                                    <h6>Đánh giá sao</h6>

                                                                    <!-- Rating Stars Box -->
                                                                    <input type="hidden" class="star_rating_value">

                                                                    {{-- <p class="counterW">Điểm: <span class="scoreNow">3</span> trên <span>5</span></p> --}}
                                                                    <ul class="ratingW">
                                                                        @if ($starRating)
                                                                            <?php
                                                                            for ($i = 1; $i <= 5; $i++) {
                                                                                if ($i <= $starRating->star) {
                                                                                    echo '<li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>';
                                                                                } else {
                                                                                    echo '<li><a href="javascript:void(0);"><div class="star"></div></a></li>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        @else
                                                                            <li class="on"><a
                                                                                    href="javascript:void(0);">
                                                                                    <div class="star"></div>
                                                                                </a></li>
                                                                            <li class="on"><a
                                                                                    href="javascript:void(0);">
                                                                                    <div class="star"></div>
                                                                                </a></li>
                                                                            <li class="on"><a
                                                                                    href="javascript:void(0);">
                                                                                    <div class="star"></div>
                                                                                </a></li>
                                                                            <li><a href="javascript:void(0);">
                                                                                    <div class="star"></div>
                                                                                </a></li>
                                                                            <li><a href="javascript:void(0);">
                                                                                    <div class="star"></div>
                                                                                </a></li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                                <p><label for="review">Bình luận</label>
                                                                    <textarea name="comment" class="comment" id="" cols="30" rows="10" style="text-align: left"></textarea>
                                                                </p>
                                                                {{-- <p><input type="submit"` class="write-comment" value="Gửi" onclick="writeComment()"></p> --}}
                                                                <button type="button" id="applyCouponButton"
                                                                    style="background-color: #FE9705; color: #fff; border: none; border-radius: 4px; padding: 9px; cursor: pointer; margin-bottom: 10px;"
                                                                    onclick="writeComment()">
                                                                    <strong>
                                                                        Gửi
                                                                    </strong>
                                                                </button>
                                                                <div id="comment-result" style="color: red;"></div>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>Đăng nhập để bình luận</strong> click vào đây <a
                                                                href="{{ route('login') }}">Đăng nhập</a>
                                                        </div>
                                                    @endif
                                                    <div id="list-comment">
                                                        @foreach ($comments as $comm)
                                                            <div class="media">
                                                                <a class="pull-left" href="#">
                                                                    <img width="50" class="media-object"
                                                                        src="{{ asset('assets/img/' . $comm->user->image) }} "
                                                                        alt="Image">
                                                                </a>

                                                                <div class="media-body">
                                                                    <h4 class="media-heading">
                                                                        {{ $comm->user->First_name }}
                                                                        {{ $comm->user->Last_name }}

                                                                        <small>{{ $comm->created_at->format('d/m/Y') }}</small>
                                                                        <ul class="ratingW-comment">
                                                                            <small>
                                                                                <?php
                                                                                for ($i = 1; $i <= 5; $i++) {
                                                                                    if ($i <= $comm->star) {
                                                                                        echo '<li class="on"><div class="star-comm"></div></li>';
                                                                                    } else {
                                                                                        echo '<li><div class="star-comm"></div></li>';
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </small>
                                                                        </ul>
                                                                    </h4>

                                                                    <p>{{ $comm->comment }}</p>
                                                                    @can('my-comment', $comm)
                                                                        <!-- <form action="" method="get" class="text-right">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <a href="" class="btn btn-primary btn-sm">Sửa</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </form> -->
                                                                        <form class="text-right">
                                                                            <button type="button" id="applyCouponButton"
                                                                                style="background-color: #f80808; color: #fff; border: none; border-radius: 4px; padding: 9px; cursor: pointer;"
                                                                                onclick="deleteComment({{ $comm->comm_id }})">
                                                                                <strong>
                                                                                    Xóa
                                                                                </strong>
                                                                            </button>
                                                                        </form>
                                                                    @endcan

                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <div class="pagination-container"
                                                        style="margin-top: 30px; text-align: center;">
                                                        {{ $products->render('/admin/pagination') }}
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
                                                                @if (auth()->check())
                                                                    @if ($product->favorited)
                                                                        <button class="add-to-wishlist"><a
                                                                                href={{ route('favorite', $product->id) }}
                                                                                class="heart"><i
                                                                                    class="fa fa-heart"></i></a><span
                                                                                class="tooltipp">Bỏ yêu
                                                                                thích</span></button>
                                                                    @else
                                                                        <button class="add-to-wishlist"><a
                                                                                href={{ route('favorite', $product->id) }}><i
                                                                                    class="fa fa-heart-o"></i></a><span
                                                                                class="tooltipp">Yêu
                                                                                thích</span></button>
                                                                    @endif
                                                                @else
                                                                    <button class="add-to-wishlist"><a
                                                                            href={{ route('login') }}><i
                                                                                class="fa fa-heart-o"></i></a><span
                                                                            class="tooltipp">Yêu
                                                                            thích</span></button>
                                                                @endif
                                                                {{-- <button class="add-to-compare"><i
                                                                        class="fa fa-exchange"></i><span
                                                                        class="tooltipp">add to
                                                                        compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                                        class="tooltipp">quick view</span></button> --}}
                                                            </div>
                                                        </div>
                                                        @foreach ($inven as $value)
                                                            @if ($value->product_id === $product->id)
                                                                @if ($value->remain_quantity > 0)
                                                                    <a onclick="AddCart({{ $product->id }})"
                                                                        href="javascript:">
                                                                        <div class="add-to-cart">
                                                                            <button class="add-to-cart-btn"><i
                                                                                    class="fa fa-shopping-cart"></i>
                                                                                Thêm vào giỏ</button>

                                                                        </div>
                                                                    </a>
                                                                @else
                                                                    <div class="out-of-stock">
                                                                        <button class="out-of-stock-btn"><i
                                                                                class="fa fa-exclamation-circle"></i> Hết
                                                                            hàng</button>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
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
