@extends('layout.app')



@section('content')
    <!-- BREADCRUMB -->

    <div id="breadcrumb" class="section">

        <!-- container -->



        <!-- /container -->

    </div>

    <!-- /BREADCRUMB -->



    <!-- SECTION -->

    <div class="section">

        <!-- container -->

        <div class="container">

            <!-- row -->

            <div class="row">

                <!-- STORE -->

                <div id="store" class="col-lg-12">

                    <!-- store top filter -->

                    <div class="store-filter clearfix">

                        <div class="store-sort">

                            <h3><strong>CÓ {{ $count_product }} KẾT QUẢ TÌM KIẾM PHÙ HỢP</strong></h3>

                        </div>

                    </div>

                    <!-- /store top filter -->



                    <!-- store products -->

                    <div class="row">

                        @foreach ($products as $product)
                            @foreach ($inventories as $inven)
                                @if ($product->id === $inven->product_id)
                                    <!-- product -->

                                    <div class="col-md-4 col-xs-6">

                                        <div class="product">

                                            <div class="product-img">

                                                <img src="{{ asset('assets/img/' . $product->pro_image) }}" alt="">

                                                <div class="product-label">

                                                </div>

                                            </div>

                                            <div class="product-body">

                                                <p class="product-category"></p>

                                                <h3 class="product-name">

                                                    <a
                                                        href="{{ route('detail.product', ['type_id' => $product->type_id, 'id' => $product->id]) }}">{{ $product->name }}</a>



                                                </h3>

                                                @if ($product->discount_price > 0)
                                                    <h4 class="product-price">

                                                        <del>{{ number_format($product->price) }}

                                                            VND</del>

                                                    </h4>

                                                    <h4 class="discount-price">

                                                        {{ number_format($product->discount_price) }} VND

                                                    </h4>
                                                @else
                                                    <h4 class="discount-price">

                                                        {{ number_format($product->price) }} VND

                                                    </h4>
                                                @endif

                                                <ul class="ratingW-comment">
                                                    <small>
                                                        @if ($product->average_rating)
                                                            <?php
                                                            for ($i = 1; $i <= 5; $i++) {
                                                                if ($i <= $product->average_rating) {
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

                                                    @if (auth()->check())
                                                        @if ($product->favorited)
                                                            <button class="add-to-wishlist"><a
                                                                    href={{ route('favorite', $product->id) }}
                                                                    class="heart"><i class="fa fa-heart"></i></a><span
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
                                                        <button class="add-to-wishlist"><a href={{ route('login') }}><i
                                                                    class="fa fa-heart-o"></i></a><span class="tooltipp">Yêu
                                                                thích</span></button>
                                                    @endif

                                                    {{-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>

                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick

                                                            view</span></button> --}}

                                                </div>

                                            </div>

                                            @if ($inven->remain_quantity)
                                                <a onclick="AddCart({{ $product->id }})" href="javascript:">
                                                    <div class="add-to-cart">
                                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
                                                            Thêm vào
                                                            giỏ</button>
                                                    </div>
                                                </a>
                                            @else
                                                <div class="out-of-stock">
                                                    <button class="out-of-stock-btn"><i
                                                            class="fa fa-exclamation-circle"></i>
                                                        Hết
                                                        hàng</button>
                                                </div>
                                            @endif

                                        </div>

                                    </div>

                                    <!-- /product -->
                                @endif
                            @endforeach
                        @endforeach

                    </div>

                    <!-- /store products -->



                    <!-- store bottom filter -->

                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">

                        {{ $products->render('/admin/pagination') }}

                    </div>

                    <!-- /store bottom filter -->

                </div>

                <!-- /STORE -->

            </div>

            <!-- /row -->

        </div>

        <!-- /container -->

    </div>

    <!-- /SECTION -->
@endsection
