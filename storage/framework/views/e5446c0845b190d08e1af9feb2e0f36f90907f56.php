
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Coupons</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Coupons</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Coupons</h3>

                    <div class="card-tools">
                        <a class="btn  btn-sm bg-green" href="coupons/create">
                            <i class="fas fa-plus"></i>
                            Add
                        </a>
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
                                <th style="width: 11%" class="text-center">
                                    Coupon_id
                                </th>
                                <th style="width: 11%" class="text-center">
                                    Coupon code
                                </th>
                                <th style="width: 11%" class="text-center">
                                    Coupon type
                                </th>
                                <th style="width: 15%" class="text-center">
                                    Coupon discount
                                </th>
                                <th style="width: 11%" class="text-center">
                                    Min order
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Quantity
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Used
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Remain
                                </th>
                                <th style="width: 13%" class="text-center">
                                    Expired date
                                </th>
                                <th style="width: 5%" class="text-center">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $couponlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center" style="width: 11%"><?php echo e($value->coupon_id); ?></td>
                                    <td class="text-center" style="width: 11%"><?php echo e($value->coupon_code); ?></td>
                                    <td class="text-center" style="width: 11%"><?php echo e($value->type_name); ?></td>
                                    <td class="text-center" style="width: 15%">
                                        <?php if($value->coupon_amount > 0 && $value->coupon_amount < 100): ?>
                                            <?php echo e(number_format($value->coupon_amount, 0, ',', '.')); ?> %
                                        <?php else: ?>
                                            <?php echo e(number_format($value->coupon_amount, 0, ',', '.')); ?> đ
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center" style="width: 11%">
                                        <?php echo e(number_format($value->min_order, 0, ',', '.')); ?> đ</td>
                                    <td class="text-center" style="width: 5%"><?php echo e($value->coupon_quantity); ?></td>
                                    <td class="text-center" style="width: 5%"><?php echo e($value->coupon_used); ?></td>
                                    <td class="text-center" style="width: 5%"><?php echo e($value->coupon_remain); ?></td>
                                    <td class="text-center" style="width: 13%">
                                        <?php echo e(date('d/m/Y', strtotime($value->coupon_expired))); ?></td>
                                    <td class="text-center" style="width: 5%">
                                        <form action="coupons/<?php echo e($value->coupon_id); ?>/edit" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Update
                                            </button>
                                        </form>
                                        <form action="coupons/<?php echo e($value->coupon_id); ?>" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" style="margin-top:6px"
                                                onclick="confirmDelete(event)">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        <?php echo e($couponlist->render('/admin/pagination')); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/admin/coupons/index.blade.php ENDPATH**/ ?>