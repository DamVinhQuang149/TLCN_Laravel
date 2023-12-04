<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="tel:0935540795"><i class="fa fa-phone"></i> 0935.540.795</a></li>
                    <li><a href="mailto:duyhoang04244@gmail.com"><i class="fa fa-envelope-o"></i>
                            duyhoang042444@gmail.com</a></li>
                    <li><a href="https://goo.gl/maps/HATUMepFByXb91iT7"><i class="fa fa-map-marker"></i> 01 Võ Văn Ngân
                            - Phường Linh Chiểu - Thành phố Thủ Đức</a></li>
                </ul>
                <ul class="header-links pull-right">
                    @if (Auth::check())
                    <li><a href="{{ route('profile', ['user_id' => Auth::user()->user_id]) }}"><i
                                class="fa fa-user-o"></i>Xin chào {{ Auth::user()->Last_name }}</a></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                    @else
                    <li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i>Đăng nhập</a></li>
                    @endif

                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="{{ route('index') }}" class="logo">
                                <img src="{{ asset('assets/img/logobandoan.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="{{ route('products.search') }}" method="GET">
                                @csrf
                                <select class="input-select" name="searchCol">
                                    <option value="0">Tất cả</option>
                                    <option value="1">Trái cây</option>
                                    <option value="2">Bánh ngọt</option>
                                    <option value="3">Rau củ</option>
                                </select>
                                <input name="keyword" class="input" placeholder="Tìm kiếm">
                                <button type="submit" class="search-btn">Tìm</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">

                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span>Giỏ hàng</span>
                                    @if (Session::has("Cart") != null)
                                        <div id="total-quanty-show" class="qty">{{ Session::get('Cart')->totalQuanty }}</div>
                                    @else
                                        <div id="total-quanty-show" class="qty">0</div>
                                    @endif
                                </a>
                                <div class="cart-dropdown">
                                    <div id="change-item-cart">
                                        @if (Session::has("Cart") != null)
                                        <div class="cart-list">
                                            @foreach (Session::get('Cart')->products as $item)
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img class="si-pic"
                                                        src="{{ asset('assets/img/' . $item['productInfo']->pro_image) }}"
                                                        alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name">
                                                        <a
                                                            href="{{ route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id]) }}">
                                                            {{ $item['productInfo']->name }}
                                                        </a>
                                                    </h3>
                                                    <h4 class="product-price"><span class="qty">{{ $item['quanty']
                                                            }}</span> x {{ number_format($item['price'])
                                                        }}VND
                                                    </h4>
                                                </div>
                                                <button class="delete">
                                                    <i class="fa fa-close" data-id="{{ $item['productInfo']->id }}"></i>
                                                </button>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="cart-summary">
                                            <small> {{ Session::get('Cart')->totalQuanty }} Sản phẩm </small>
                                            <h5>SUBTOTAL: {{ number_format(Session::get('Cart')->totalPrice) }} VND</h5>
                                        </div>
                                        @else
                                        <div class="cart-summary">
                                            <h5>Không có sản phẩm nào trong giỏ hàng</h5>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="cart-btns">
                                        <a href="{{ route('list.cart') }}">Xem giỏ hàng</a>
                                        <a href="{{ route('list.order') }}">Xem đơn hàng <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                    @foreach ($protypes as $value)
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('products', ['type_id' => $value->type_id]) }}">{{ $value->type_name }}</a>
                    </li>
                    @endforeach
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->