
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Orders</h3>

                    <div class="card-tools">

                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 5%">
                                    Order_id
                                </th>
                                <th style="width: 5%">
                                    User_id
                                </th>
                                <th style="width: 25%" class="text-center">
                                    Address
                                </th>
                                <th style="width: 10%">
                                    Phone
                                </th>
                                <th style="width: 5%">
                                    Total
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Note
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Checkout
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Status
                                </th>
                                <th style="width: 10%">
                                    Date_create
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Details
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center" style="width: 5%"><?php echo e($value->order_id); ?></td>
                                    <td class="text-center" style="width: 5%"><?php echo e($value->user_id); ?></td>
                                    <td class="text-center" style="width: 20%"><?php echo e($value->address); ?></td>
                                    <td style="width: 10%"><?php echo e($value->phone); ?></td>
                                    <td style="width: 9%">Mã giảm giá:
                                        <?php if($value->coupon_discount > 100): ?>
                                            <?php echo e(number_format(-$value->coupon_discount, 0, ',', '.')); ?>

                                        <?php else: ?>
                                            <?php echo e(number_format(-(($value->coupon_discount * ($value->total / (1 - $value->coupon_discount / 100))) / 100), 0, ',', '.')); ?>

                                        <?php endif; ?> đ
                                        <div></div>
                                        Tổng tiền: <?php echo e(number_format($value->total, 0, ',', '.')); ?> đ
                                    </td>
                                    <td style="width: 10%"><?php echo e($value->note); ?></td>
                                    <td style="width: 10%">
                                        <?php if($value->checkout == 0): ?>
                                            <?php echo e('Chuyển khoản ngân hàng'); ?>

                                        <?php else: ?>
                                            <?php echo e('Thanh toán khi nhận hàng'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center" style="width: 10%">

                                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($stt['status'] == $value['status']): ?>
                                                <?php echo e($stt->status_name); ?>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td style="width: 10%"><?php echo e($value->created_at); ?> </td>
                                    <td class="project-actions text-right">
                                        <form action="orderdetails/<?php echo e($value->order_id); ?>" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-sm bg-green" style="margin-bottom: 10px;">
                                                <i class="fa fa-eye">
                                                </i>
                                                View
                                            </button>
                                        </form>
                                        <form action="orders/<?php echo e($value->order_id); ?>/edit" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        <?php echo e($orders->render('/admin/pagination')); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>