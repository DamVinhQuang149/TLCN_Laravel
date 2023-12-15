
<?php $__env->startSection('content'); ?>
<head>
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
                            <form method="get" action="#">
                                <?php echo csrf_field(); ?>
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            
                                            <th style="width: 5%" class="text-center">
                                                MÃ ĐƠN HÀNG
                                            </th>
                                            <th style="width: 10%" class="text-center">
                                                ẢNH
                                            </th>
                                            <th style="width: 25%" class="text-center">
                                                TÊN SẢN PHẨM
                                            </th>
                                            <th style="width: 15%" class="text-center">
                                                LOẠI SẢN PHẨM
                                            </th>
                                            <th class="text-center">
                                                GIÁ
                                            </th>
                                            <th style="width: 10%" class="text-center">
                                                SỐ LƯỢNG
                                            </th>
                                            <th class="text-center">
                                                TỔNG GIÁ
                                            </th>
                                            <th class="product-action" style="width:3%">
                                                <button class="btn btn-info">
                                                    <a style="text-decoration: none;color:#fff;" href="<?php echo e(route('list.order')); ?>">
                                                        <i class="fa fa-arrow-left"></i> QUAY LẠI
                                                    </a>
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center" style="width: 5%"><?php echo e($value->order_id); ?></td>
                                                <td><img style="width:102px" class="text-center"
                                                        src="<?php echo e(asset('assets/img/' . $value->product_image)); ?>">
                                                </td>
                                                <td class="text-center" style="width: 5%"><?php echo e($value->product_name); ?></td>
                                                <td class="text-center" style="width: 5%"><?php echo e($value->type_name); ?></td>
                                                <td class="text-center" style="width: 15%"><?php echo e(number_format($value->discount_price, 0, ',', '.')); ?> đ</td>
                                                <td class="text-center">x <?php echo e($value->product_quantity); ?></td>
                                                <td style="width: 20%"><?php echo e(number_format($value->cost, 0, ',', '.')); ?> đ</td>
                                                <td style="width: 20%"></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/list-detail-order.blade.php ENDPATH**/ ?>