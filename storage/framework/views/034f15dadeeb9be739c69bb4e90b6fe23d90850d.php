
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
                                            <th class="order-id" style="width:5%">MÃ</th>
                                            <th class="product-cost" style="width:12%">THÀNH TIỀN</th>
                                            
                                            
                                            <th class="product-phone">SỐ ĐIỆN THOẠI</th>
                                            <th class="product-checkout">THANH TOÁN</th>
                                            <th class="product-status">TÌNH TRẠNG</th>
                                            <th class="product-date-create" style="width:12%">NGÀY ĐẶT HÀNG</th>
                                            <th class="product-action" style="width:3%">HÀNH ĐỘNG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $listorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="order-id">
                                                    <strong>
                                                        <?php echo e($item->order_id); ?>

                                                    </strong>
                                                </td>

                                                <td class="product-cost" style="width:12%">
                                                    <strong>
                                                        <?php echo e(number_format($item->total, 0, ',', '.')); ?>đ
                                                    </strong>
                                                </td>
                                                
                                                
                                                <td class="product-phone">
                                                    <strong>
                                                        <?php echo e($item->phone); ?>

                                                    </strong>
                                                </td>
                                                <td class="product-checkout">
                                                    <strong>
                                                        <?php if($item->checkout == 0): ?>
                                                            Chuyển khoản ngân hàng
                                                        <?php else: ?>
                                                            Thanh toán khi nhận hàng
                                                        <?php endif; ?>
                                                    </strong>
                                                </td>
                                                <td class="product-status">
                                                    <strong>
                                                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($stt['status'] == $item['status']): ?>
                                                                <?php echo e($stt->status_name); ?>

                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </strong>
                                                </td>
                                                <td class="product-date-create">
                                                    <strong>
                                                        <?php echo e($item->created_at); ?>

                                                    </strong>
                                                </td>
                                                <td class="product-action">
                                                    <button class="btn btn-print"
                                                        style="background-color: green; margin-bottom:6px">
                                                        <a style="text-decoration: none; color: #fff;"
                                                            href="<?php echo e(url('/invoices/' . $item->order_id)); ?>"
                                                            target="_blank">
                                                            <i class="fa fa-print"></i> IN HÓA ĐƠN
                                                        </a>
                                                    </button>
                                                    <button class="btn btn-info"
                                                        style="margin-bottom:7px;background-color:#FE9705;border-color:#FE9705">
                                                        <a style="text-decoration: none; color:#fff;"
                                                            href="<?php echo e(route('list.detailorder', $item->order_id)); ?>">
                                                            <i class="fa fa-pencil"></i> XEM CHI TIẾT
                                                        </a>
                                                    </button>

                                                    <?php if($item->status == 4): ?>
                                                        <button class="btn btn-received">
                                                            <a style="text-decoration: none; color:#fff;"
                                                                href="<?php echo e(route('received.order', ['order_id' => $item->order_id])); ?>">
                                                                <i
                                                                    class="fa
                                                                fa-check"></i>
                                                                ĐÃ NHẬN HÀNG
                                                            </a>
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if($item->status == 1 || $item->status == 5 || $item->status == 6): ?>
                                                        <button class="btn btn-reorder" style="background-color: #80bb35">
                                                            <a style="text-decoration: none;color:#fff;"
                                                                href="<?php echo e(route('reset.order', $item->order_id)); ?>">
                                                                <i class="fa fa-refresh"></i> ĐẶT HÀNG LẠI
                                                            </a>
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if($item->status == 0): ?>
                                                        <button class="btn btn-reorder" style="background-color:red;">
                                                            <a style="text-decoration: none;color:#fff;"
                                                                href="<?php echo e(route('canceled.order', ['order_id' => $item->order_id])); ?>">
                                                                <i class="fa fa-trash-o"></i> HỦY ĐƠN HÀNG
                                                            </a>
                                                        </button>
                                                    <?php endif; ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>

                                </table>
                            </form>
                            <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                                <?php echo e($listorder->render('/admin/pagination')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\khoaluanchuyennganh\code\TLCN_Laravel\resources\views/list-order.blade.php ENDPATH**/ ?>