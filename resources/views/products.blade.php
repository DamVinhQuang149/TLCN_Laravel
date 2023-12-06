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
                            <label>
                                Sắp xếp:
                                <select class="input-select select-filter" id="select-filter">
                                    <option value="0">---Lọc theo---</option>
                                    <option value="{{ Request::url() }}?sort_by=kytu_az">Ký tự A-Z</option>
                                    <option value="{{ Request::url() }}?sort_by=kytu_za">Ký tự Z-A</option>
                                    {{-- <option value="{{ Request::url() }}?sort_by=nodiscount_tang_dan">Giá không khuyến mãi tăng dần</option>
                                <option value="{{ Request::url() }}?sort_by=nodiscount_giam_dan">Giá không khuyến mãi giảm dần</option>
                                <option value="{{ Request::url() }}?sort_by=discount_tang_dan">Giá khuyến mãi tăng dần</option>
                                <option value="{{ Request::url() }}?sort_by=discount_giam_dan">Giá khuyến mãi giảm dần</option> --}}
                                </select>
                            </label>

                            {{-- <label>
                            Hiển thị:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label> --}}
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        @foreach ($products as $product)
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
                                        {{-- <h4 class="product-price">
                                    <del>{{ number_format($product->price) }} VND</del>
                                </h4>
                                <h4 class="discount-price">
                                    {{ number_format($product->discount_price) }} VND
                                </h4>    --}}
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
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                                    view</span></button>
                                        </div>
                                    </div>
                                    <a onclick="AddCart({{ $product->id }})" href="javascript:">
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào
                                                giỏ</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- /product -->
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
