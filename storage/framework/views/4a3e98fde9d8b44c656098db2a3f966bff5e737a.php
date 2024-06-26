<?php $__env->startSection('content'); ?>
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/style1.css">
<link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/responsive.css">
</head>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form action="#" method="get">
                            <?php echo csrf_field(); ?>
                            <div id="change-list-cart">
                                <?php if(Session::has("Cart") != null): ?>
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
                                    <?php $__currentLoopData = Session::get('Cart')->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-image">
                                                <a
                                                    href="<?php echo e(route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id])); ?>">
                                                    <img width="145" height="145" alt="poster_1_up"
                                                        class="shop_thumbnail"
                                                        src="<?php echo e(asset('assets/img/' . $item['productInfo']->pro_image)); ?>">
                                                </a>
                                            </td>
                                            <td class="product-name" style="max-width: 440px;">
                                                <a
                                                    href="<?php echo e(route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id])); ?>">
                                                    <strong><?php echo e($item['productInfo']->name); ?></strong>
                                                </a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><strong><?php echo e(number_format($item['price1'])); ?>VND</strong></span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <strong>
                                                        <input id="quanty-item-<?php echo e($item['productInfo']->id); ?>"
                                                            style="border-color: #000; border-radius: 4px; padding: 5px; width: 40px; text-align: center;"
                                                            type="number" min="1" class="input-text qty text"
                                                            title="Qty" value="<?php echo e($item['quanty']); ?>">
                                                    </strong>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">
                                                    <strong><?php echo e(number_format($item['price'])); ?> VND</strong>
                                                </span>
                                            </td>
                                            <td class="product-remove">
                                                <a title="Save this item" class="product-save" style="text-decoration: none;border:1px solid #000; padding:9px; border-radius:6px"
                                                    onclick="DeleteListItemCart(<?php echo e($item['productInfo']->id); ?>)"
                                                    href="javascript:">
                                                    Xóa
                                                </a>
                                            </td>
                                            <td class="product-save">
                                                <a title="Save this item" class="product-save" style="text-decoration: none;border:1px solid #000; padding:9px; border-radius:6px"
                                                    href="javascript:"
                                                    onclick="SaveListItemCart(<?php echo e($item['productInfo']->id); ?>)">
                                                    Cập nhật
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="actions" colspan="7">
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn">
                                                    <a style="text-decoration: none;" href="<?php echo e(route('view.checkout')); ?>">
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
                                                                <?php echo e(number_format(Session::get('Cart')->totalPrice)); ?>

                                                                VND
                                                            </span>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php else: ?>
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
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-LARAVEL-main\resources\views/list-cart.blade.php ENDPATH**/ ?>