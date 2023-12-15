<style type="text/css">
.main-body {
    padding: 15px;
}

.card {
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col,
.gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}

.mb-3,
.my-3 {
    margin-bottom: 1rem !important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}

.h-100 {
    height: 100% !important;
}

.shadow-none {
    box-shadow: none !important;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Capple - Website bán đồ ăn, trái cây, rau củ trực tuyến</title>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/style.css" />


</head>


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
                    <?php if(Auth::check()): ?>
                        <li><a href="<?php echo e(route('profile', ['user_id' => Auth::user()->user_id])); ?>"><i class="fa fa-user-o"></i>Xin chào <?php echo e(Auth::user()->Last_name); ?></a></li>
                        <li><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                    <?php else: ?>
                        <li><a href="<?php echo e(route('login')); ?>"><i class="fa fa-user-o"></i>Đăng nhập</a></li>
                    <?php endif; ?>
                    
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
                            <a href="<?php echo e(route('index')); ?>" class="logo">
                                <img src="<?php echo e(asset('assets/img/logobandoan.jpg')); ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form method="get" action="result.php">
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
                                    <?php if(Session::has("Cart") != null): ?>
                                        <div id="total-quanty-show" class="qty"><?php echo e(Session::get('Cart')->totalQuanty); ?></div>
                                    <?php else: ?>
                                        <div id="total-quanty-show" class="qty">0</div>
                                    <?php endif; ?>
                                </a>
                                <div class="cart-dropdown">
                                    <div id="change-item-cart">
                                        <?php if(Session::has("Cart") != null): ?>
                                        <div class="cart-list">
                                            <?php $__currentLoopData = Session::get('Cart')->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img class="si-pic"
                                                        src="<?php echo e(asset('assets/img/' . $item['productInfo']->pro_image)); ?>"
                                                        alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name">
                                                        <a
                                                            href="<?php echo e(route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id])); ?>">
                                                            <?php echo e($item['productInfo']->name); ?>

                                                        </a>
                                                    </h3>
                                                    <h4 class="product-price"><span class="qty"><?php echo e($item['quanty']); ?></span> x <?php echo e(number_format($item['price'])); ?>VND
                                                    </h4>
                                                </div>
                                                <button class="delete">
                                                    <i class="fa fa-close" data-id="<?php echo e($item['productInfo']->id); ?>"></i>
                                                </button>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="cart-summary">
                                            <small> <?php echo e(Session::get('Cart')->totalQuanty); ?> Sản phẩm </small>
                                            <h5>SUBTOTAL: <?php echo e(number_format(Session::get('Cart')->totalPrice)); ?> VND</h5>
                                        </div>
                                        <?php else: ?>
                                        <div class="cart-summary">
                                            <h5>Không có sản phẩm nào trong giỏ hàng</h5>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="<?php echo e(route('list.cart')); ?>">Xem giỏ hàng</a>
                                        <a href="<?php echo e(route('list.order')); ?>">Xem đơn hàng <i
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
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/layout/user.blade.php ENDPATH**/ ?>