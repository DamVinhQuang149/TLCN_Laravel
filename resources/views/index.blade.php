@extends('layout.app')

@section('content')
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            * {
                box-sizing: border-box
            }

            .my-slide-haha {
                font-family: Verdana, sans-serif;
                margin: 0
            }

            .mySlides-slide {
                display: none
            }

            img {
                vertical-align: middle;
            }

            /* Slideshow container */
            .slideshow-container-slide {
                max-width: 1143px;
                position: relative;
                margin: auto;
                margin-top: 40px;
                height: 372px;
            }



            /* Caption text */
            .text-slide {
                color: #f2f2f2;
                font-size: 15px;
                padding: 8px 12px;
                position: absolute;
                bottom: 8px;
                width: 100%;
                text-align: center;
            }

            /* Number text (1/3 etc) */
            .numbertext-slide {
                color: #f2f2f2;
                font-size: 12px;
                padding: 8px 12px;
                position: absolute;
                top: 0;
            }

            /* The dots/bullets/indicators */
            .dot-slide {
                cursor: pointer;
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
            }

            .active-slide,
            .dot-slide:hover {
                background-color: #717171;
            }

            /* Fading animation */
            .fade-slide {
                animation-name: fade;
                animation-duration: 1.5s;
            }

            @keyframes fade-slide {
                from {
                    opacity: .4
                }

                to {
                    opacity: 1
                }
            }

            /* On smaller screens, decrease text size */
            @media only screen and (max-width: 300px) {

                .prev-slide,
                .next-slide,
                .text-slide {
                    font-size: 11px
                }
            }
        </style>
    </head>
    <div class="my-slide-haha">

        <div class="slideshow-container-slide">

            <div class="mySlides-slide fade-slide">
                <div class="numbertext-slide"></div>
                <img src="{{ asset('assets/img/slide1.jpg') }}" style="width:100%; border-radius: 12px">
            </div>

            <div class="mySlides-slide fade-slide">
                <div class="numbertext-slide"></div>
                <img src="{{ asset('assets/img/slide2.jpg') }}" style="width:100%; border-radius: 12px">
            </div>

        </div>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot-slide" onclick="currentSlide(1)"></span>
        <span class="dot-slide" onclick="currentSlide(2)"></span>
        <span class="dot-slide" onclick="currentSlide(3)"></span>
    </div>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides-slide");
            let dots = document.getElementsByClassName("dot-slide");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active-slide", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active-slide";
            setTimeout(showSlides, 3000);
        }
    </script>


    </body>

    </html>


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ asset('assets/img/banhngot.jpg') }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Bánh ngọt</h3>
                            <a href="{{ route('products', ['type_id' => 2]) }}" class="cta-btn">Shop now <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ asset('assets') }}/img/traicaytuoi.jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Trái cây tươi</h3>
                            <a href="{{ route('products', ['type_id' => 1]) }}" class="cta-btn">Shop now <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ asset('assets') }}/img/raucusach.jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Rau củ sạch</h3>
                            <a href="{{ route('products', ['type_id' => 3]) }}" class="cta-btn">Shop now <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Sản phẩm top bán chạy</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Trái cây</a></li>
                                <li><a data-toggle="tab" href="#tab2">Bánh ngọt</a></li>
                                <li><a data-toggle="tab" href="#tab3">Rau củ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    @foreach ($productsby1 as $value)
                                        @foreach ($inventories as $inven)
                                            @if ($value->id === $inven->product_id && $inven->sold_quantity > 30)
                                                <!-- product -->
                                                <div class="product">
                                                    <div class="product-img">
                                                        <img style="width=100px"
                                                            src="{{ asset('assets/img/' . $value['pro_image']) }}"
                                                            alt="">
                                                        <div class="product-label" style="border-radius: 3px">
                                                            <span class="new">TOP</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category"></p>
                                                        <h3 class="product-name"><a
                                                                href="{{ route('detail.product', ['type_id' => $value->type_id, 'id' => $value->id]) }}">{{ $value->name }}</a>
                                                        </h3>
                                                        @if ($value['discount_price'] > 0)
                                                            <h4 class="product-price">
                                                                <del>{{ number_format($value->price) }} <u>đ</u></del>
                                                            </h4>
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->discount_price) }} <u>đ</u>
                                                            </h4>
                                                        @else
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->price) }} <u>đ</u>
                                                            </h4>
                                                        @endif
                                                        <ul class="ratingW-comment">
                                                            <small>
                                                                @if ($value->average_rating)
                                                                    <?php
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $value->average_rating) {
                                                                            echo '<li class="on"><div class="star-comm"></div></li>';
                                                                        } else {
                                                                            echo '<li><div class="star-comm"></div></li>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                @else
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                @endif
                                                            </small>
                                                        </ul>
                                                        <div class="product-btns">
                                                            <button class="add-to-wishlist"><i
                                                                    class="fa fa-heart-o"></i><span class="tooltipp">Yêu
                                                                    thích</span></button>
                                                        </div>
                                                    </div>
                                                    @if ($inven->remain_quantity)
                                                        <a onclick="AddCart({{ $value->id }})" href="javascript:">
                                                            <div class="add-to-cart">
                                                                <button class="add-to-cart-btn"><i
                                                                        class="fa fa-shopping-cart"></i>
                                                                    Thêm vào
                                                                    giỏ</button>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <div class="out-of-stock">
                                                            <button class="out-of-stock-btn"><i
                                                                    class="fa fa-exclamation-circle"></i> Hết hàng</button>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /product -->
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->

                            <!-- tab -->
                            <div id="tab2" class="tab-pane ">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    @foreach ($productsby2 as $value)
                                        @foreach ($inventories as $inven)
                                            @if ($value->id === $inven->product_id && $inven->sold_quantity > 30)
                                                <div class="product">
                                                    <div class="product-img">
                                                        <img style="width=100px"
                                                            src="{{ asset('assets/img/' . $value['pro_image']) }}"
                                                            alt="">
                                                        <div class="product-label">
                                                            <span class="new">TOP</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category"></p>
                                                        <h3 class="product-name"><a
                                                                href="{{ route('detail.product', ['type_id' => $value->type_id, 'id' => $value->id]) }}">{{ $value->name }}</a>
                                                        </h3>
                                                        @if ($value['discount_price'] > 0)
                                                            <h4 class="product-price">
                                                                <del>{{ number_format($value->price) }} <u>đ</u></del>
                                                            </h4>
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->discount_price) }} <u>đ</u>
                                                            </h4>
                                                        @else
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->price) }} <u>đ</u>
                                                            </h4>
                                                        @endif
                                                        <ul class="ratingW-comment">
                                                            <small>
                                                                @if ($value->average_rating)
                                                                    <?php
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $value->average_rating) {
                                                                            echo '<li class="on"><div class="star-comm"></div></li>';
                                                                        } else {
                                                                            echo '<li><div class="star-comm"></div></li>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                @else
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                @endif
                                                            </small>
                                                        </ul>
                                                        <div class="product-btns">
                                                            <button class="add-to-wishlist"><i
                                                                    class="fa fa-heart-o"></i><span class="tooltipp">Yêu
                                                                    thích</span></button>
                                                        </div>
                                                    </div>
                                                    @if ($inven->remain_quantity)
                                                        <a onclick="AddCart({{ $value->id }})" href="javascript:">
                                                            <div class="add-to-cart">
                                                                <button class="add-to-cart-btn"><i
                                                                        class="fa fa-shopping-cart"></i>
                                                                    Thêm vào
                                                                    giỏ</button>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <div class="out-of-stock">
                                                            <button class="out-of-stock-btn"><i
                                                                    class="fa fa-exclamation-circle"></i> Hết hàng</button>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /product -->
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>

                            </div>
                            <!-- /tab -->

                            <!-- tab -->
                            <div id="tab3" class="tab-pane ">
                                <div class="products-slick" data-nav="#slick-nav-3">
                                    @foreach ($productsby3 as $value)
                                        @foreach ($inventories as $inven)
                                            @if ($value->id === $inven->product_id && $inven->sold_quantity > 30)
                                                <div class="product">
                                                    <div class="product-img">
                                                        <img style="width=100px"
                                                            src="{{ asset('assets/img/' . $value['pro_image']) }}"
                                                            alt="">
                                                        <div class="product-label">
                                                            <span class="new">TOP</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category"></p>
                                                        <h3 class="product-name"><a
                                                                href="{{ route('detail.product', ['type_id' => $value->type_id, 'id' => $value->id]) }}">{{ $value->name }}</a>
                                                        </h3>
                                                        @if ($value['discount_price'] > 0)
                                                            <h4 class="product-price">
                                                                <del>{{ number_format($value->price) }} <u>đ</u></del>
                                                            </h4>
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->discount_price) }} <u>đ</u>
                                                            </h4>
                                                        @else
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->price) }} <u>đ</u>
                                                            </h4>
                                                        @endif
                                                        <ul class="ratingW-comment">
                                                            <small>
                                                                @if ($value->average_rating)
                                                                    <?php
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $value->average_rating) {
                                                                            echo '<li class="on"><div class="star-comm"></div></li>';
                                                                        } else {
                                                                            echo '<li><div class="star-comm"></div></li>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                @else
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                @endif
                                                            </small>
                                                        </ul>
                                                        <div class="product-btns">
                                                            <button class="add-to-wishlist"><i
                                                                    class="fa fa-heart-o"></i><span class="tooltipp">Yêu
                                                                    thích</span></button>
                                                        </div>
                                                    </div>
                                                    @if ($inven->remain_quantity)
                                                        <a onclick="AddCart({{ $value->id }})" href="javascript:">
                                                            <div class="add-to-cart">
                                                                <button class="add-to-cart-btn"><i
                                                                        class="fa fa-shopping-cart"></i>
                                                                    Thêm vào
                                                                    giỏ</button>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <div class="out-of-stock">
                                                            <button class="out-of-stock-btn"><i
                                                                    class="fa fa-exclamation-circle"></i> Hết hàng</button>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /product -->
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <div id="slick-nav-3" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->

                            <!-- tab -->


                            <!-- /tab -->
                        </div>

                    </div>

                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <div class="section">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <img style="border: 1px; border-radius: 9px" src="{{ asset('assets/img/banner.png') }}"
                        alt="banner">
                </div>
            </div>
        </div>
    </div>
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Sản phẩm tươi mới mỗi ngày</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab4">Trái cây</a></li>
                                <li><a data-toggle="tab" href="#tab5">Bánh ngọt</a></li>
                                <li><a data-toggle="tab" href="#tab6">Rau củ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab4" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-4">
                                    @foreach ($productsby1 as $value)
                                        @foreach ($inventories as $inven)
                                            @if ($value->id === $inven->product_id)
                                                <!-- product -->
                                                <div class="product">
                                                    <div class="product-img">
                                                        <img style="width=100px"
                                                            src="{{ asset('assets/img/' . $value['pro_image']) }}"
                                                            alt="">
                                                        <div class="product-label" style="border-radius: 3px">
                                                            <span class="new">NEW</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category"></p>
                                                        <h3 class="product-name"><a
                                                                href="{{ route('detail.product', ['type_id' => $value->type_id, 'id' => $value->id]) }}">{{ $value->name }}</a>
                                                        </h3>
                                                        @if ($value['discount_price'] > 0)
                                                            <h4 class="product-price">
                                                                <del>{{ number_format($value->price) }} <u>đ</u></del>
                                                            </h4>
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->discount_price) }} <u>đ</u>
                                                            </h4>
                                                        @else
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->price) }} <u>đ</u>
                                                            </h4>
                                                        @endif
                                                        <ul class="ratingW-comment">
                                                            <small>
                                                                @if ($value->average_rating)
                                                                    <?php
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $value->average_rating) {
                                                                            echo '<li class="on"><div class="star-comm"></div></li>';
                                                                        } else {
                                                                            echo '<li><div class="star-comm"></div></li>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                @else
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                @endif
                                                            </small>
                                                        </ul>
                                                        <div class="product-btns">
                                                            <button class="add-to-wishlist"><i
                                                                    class="fa fa-heart-o"></i><span class="tooltipp">Yêu
                                                                    thích</span></button>
                                                        </div>
                                                    </div>
                                                    @if ($inven->remain_quantity)
                                                        <a onclick="AddCart({{ $value->id }})" href="javascript:">
                                                            <div class="add-to-cart">
                                                                <button class="add-to-cart-btn"><i
                                                                        class="fa fa-shopping-cart"></i>
                                                                    Thêm vào
                                                                    giỏ</button>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <div class="out-of-stock">
                                                            <button class="out-of-stock-btn"><i
                                                                    class="fa fa-exclamation-circle"></i> Hết hàng</button>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /product -->
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <div id="slick-nav-4" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->

                            <!-- tab -->
                            <div id="tab5" class="tab-pane ">
                                <div class="products-slick" data-nav="#slick-nav-5">
                                    @foreach ($productsby2 as $value)
                                        @foreach ($inventories as $inven)
                                            @if ($value->id === $inven->product_id)
                                                <div class="product">
                                                    <div class="product-img">
                                                        <img style="width=100px"
                                                            src="{{ asset('assets/img/' . $value['pro_image']) }}"
                                                            alt="">
                                                        <div class="product-label">
                                                            <span class="new">NEW</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category"></p>
                                                        <h3 class="product-name"><a
                                                                href="{{ route('detail.product', ['type_id' => $value->type_id, 'id' => $value->id]) }}">{{ $value->name }}</a>
                                                        </h3>
                                                        @if ($value['discount_price'] > 0)
                                                            <h4 class="product-price">
                                                                <del>{{ number_format($value->price) }} <u>đ</u></del>
                                                            </h4>
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->discount_price) }} <u>đ</u>
                                                            </h4>
                                                        @else
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->price) }} <u>đ</u>
                                                            </h4>
                                                        @endif
                                                        <ul class="ratingW-comment">
                                                            <small>
                                                                @if ($value->average_rating)
                                                                    <?php
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $value->average_rating) {
                                                                            echo '<li class="on"><div class="star-comm"></div></li>';
                                                                        } else {
                                                                            echo '<li><div class="star-comm"></div></li>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                @else
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                @endif
                                                            </small>
                                                        </ul>
                                                        <div class="product-btns">
                                                            <button class="add-to-wishlist"><i
                                                                    class="fa fa-heart-o"></i><span class="tooltipp">Yêu
                                                                    thích</span></button>
                                                        </div>
                                                    </div>
                                                    @if ($inven->remain_quantity)
                                                        <a onclick="AddCart({{ $value->id }})" href="javascript:">
                                                            <div class="add-to-cart">
                                                                <button class="add-to-cart-btn"><i
                                                                        class="fa fa-shopping-cart"></i>
                                                                    Thêm vào
                                                                    giỏ</button>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <div class="out-of-stock">
                                                            <button class="out-of-stock-btn"><i
                                                                    class="fa fa-exclamation-circle"></i> Hết hàng</button>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /product -->
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <div id="slick-nav-5" class="products-slick-nav"></div>

                            </div>
                            <!-- /tab -->

                            <!-- tab -->
                            <div id="tab6" class="tab-pane ">
                                <div class="products-slick" data-nav="#slick-nav-6">
                                    @foreach ($productsby3 as $value)
                                        @foreach ($inventories as $inven)
                                            @if ($value->id === $inven->product_id)
                                                <div class="product">
                                                    <div class="product-img">
                                                        <img style="width=100px"
                                                            src="{{ asset('assets/img/' . $value['pro_image']) }}"
                                                            alt="">
                                                        <div class="product-label">
                                                            <span class="new">NEW</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category"></p>
                                                        <h3 class="product-name"><a
                                                                href="{{ route('detail.product', ['type_id' => $value->type_id, 'id' => $value->id]) }}">{{ $value->name }}</a>
                                                        </h3>
                                                        @if ($value['discount_price'] > 0)
                                                            <h4 class="product-price">
                                                                <del>{{ number_format($value->price) }} <u>đ</u></del>
                                                            </h4>
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->discount_price) }} <u>đ</u>
                                                            </h4>
                                                        @else
                                                            <h4 class="discount-price">
                                                                {{ number_format($value->price) }} <u>đ</u>
                                                            </h4>
                                                        @endif
                                                        <ul class="ratingW-comment">
                                                            <small>
                                                                @if ($value->average_rating)
                                                                    <?php
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $value->average_rating) {
                                                                            echo '<li class="on"><div class="star-comm"></div></li>';
                                                                        } else {
                                                                            echo '<li><div class="star-comm"></div></li>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                @else
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                    <li class="on">
                                                                        <div class="star-comm"></div>
                                                                    </li>
                                                                @endif
                                                            </small>
                                                        </ul>
                                                        <div class="product-btns">
                                                            <button class="add-to-wishlist"><i
                                                                    class="fa fa-heart-o"></i><span class="tooltipp">Yêu
                                                                    thích</span></button>
                                                        </div>
                                                    </div>
                                                    @if ($inven->remain_quantity)
                                                        <a onclick="AddCart({{ $value->id }})" href="javascript:">
                                                            <div class="add-to-cart">
                                                                <button class="add-to-cart-btn"><i
                                                                        class="fa fa-shopping-cart"></i>
                                                                    Thêm vào
                                                                    giỏ</button>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <div class="out-of-stock">
                                                            <button class="out-of-stock-btn"><i
                                                                    class="fa fa-exclamation-circle"></i> Hết hàng</button>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /product -->
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <div id="slick-nav-6" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->

                            <!-- tab -->


                            <!-- /tab -->
                        </div>

                    </div>

                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->

    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Ngày</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Giờ</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Phút</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Giây</span>
                                </div>
                            </li>
                        </ul>

                        <h2 class="text-uppercase">Khuyến mãi trong tuần</h2>
                        <p>Sản phẩm mới giảm tới 50%</p>
                        <a class="primary-btn cta-btn" href="{{ route('products', ['type_id' => 1]) }}">Mua ngay</a>

                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-6">
                    <div class="policy">
                        <div class="shop-img">
                            <img src="{{ asset('assets/img/shipping-policy.png') }}" alt="">
                        </div>
                        <div class="shop-body dancing-script">
                            <h3>Miễn phí vận chuyển cho đơn hàng từ 300.000 <u>đ</u></h3>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-6">
                    <div class="policy">
                        <div class="shop-img">
                            <img src="{{ asset('assets') }}/img/hotdealsale.png" alt="">
                        </div>
                        <div class="shop-body dancing-script">
                            <h3>Nhiều Coupon & Khuyến mãi hấp dẫn</h3>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->

                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">TRÁI CÂY NỔI BẬT</h4>
                        <div class="section-nav">
                            <div id="slick-nav-7" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-7">
                        @foreach ($productsFeatureBy1->chunk(3) as $chunk)
                            <div>
                                @foreach ($chunk as $value)
                                    <!-- product widget -->
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/' . $value->pro_image) }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"></p>
                                            <h3 class="product-name">
                                                <a
                                                    href="{{ route('detail.product', ['type_id' => $value->type_id, 'id' => $value->id]) }}">
                                                    {{ $value->name }}
                                                </a>
                                            </h3>
                                            @if ($value->discount_price > 0)
                                                <h5 class="product-price">
                                                    <del>{{ number_format($value->price) }} <u>đ</u></del>
                                                </h5>
                                                <h5 class="discount-price">
                                                    {{ number_format($value->discount_price) }} <u>đ</u>
                                                </h5>
                                            @else
                                                <h5 class="discount-price">
                                                    {{ number_format($value->price) }} <u>đ</u>
                                                </h5>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /product widget -->
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">BÁNH NGỌT NỔI BẬT</h4>
                        <div class="section-nav">
                            <div id="slick-nav-8" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-8">
                        @foreach ($productsFeatureBy2->chunk(3) as $chunk)
                            <div>
                                @foreach ($chunk as $value)
                                    <!-- product widget -->
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/' . $value->pro_image) }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"></p>
                                            <h3 class="product-name">
                                                <a
                                                    href="{{ route('detail.product', ['type_id' => $value->type_id, 'id' => $value->id]) }}">
                                                    {{ $value->name }}
                                                </a>
                                            </h3>
                                            @if ($value->discount_price > 0)
                                                <h5 class="product-price">
                                                    <del>{{ number_format($value->price) }} <u>đ</u></del>
                                                </h5>
                                                <h5 class="discount-price">
                                                    {{ number_format($value->discount_price) }} <u>đ</u>
                                                </h5>
                                            @else
                                                <h5 class="discount-price">
                                                    {{ number_format($value->price) }} <u>đ</u>
                                                </h5>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /product widget -->
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">RAU CỦ NỔI BẬT</h4>
                        <div class="section-nav">
                            <div id="slick-nav-9" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-9">
                        @foreach ($productsFeatureBy3->chunk(3) as $chunk)
                            <div>
                                @foreach ($chunk as $value)
                                    <!-- product widget -->
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/img/' . $value->pro_image) }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"></p>
                                            <h3 class="product-name">
                                                <a
                                                    href="{{ route('detail.product', ['type_id' => $value->type_id, 'id' => $value->id]) }}">
                                                    {{ $value->name }}
                                                </a>
                                            </h3>
                                            @if ($value->discount_price > 0)
                                                <h5 class="product-price">
                                                    <del>{{ number_format($value->price) }} <u>đ</u></del>
                                                </h5>
                                                <h5 class="discount-price">
                                                    {{ number_format($value->discount_price) }} <u>đ</u>
                                                </h5>
                                            @else
                                                <h5 class="discount-price">
                                                    {{ number_format($value->price) }} <u>đ</u>
                                                </h5>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /product widget -->
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
