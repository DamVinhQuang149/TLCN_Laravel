
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
                            <li class="breadcrumb-item active">Order Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Orders Details</h3>
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
                                <th style="width: 10%" class="text-center">
                                    IMAGE
                                </th>
                                <th style="width: 25%" class="text-center">
                                    NAME
                                </th>
                                <th style="width: 15%" class="text-center">
                                    TYPE
                                </th>
                                <th class="text-center">
                                    PRICE
                                </th>
                                <th style="width: 10%" class="text-center">
                                    QUANTITY
                                </th>
                                <th style="width: 15%" class="text-center">
                                    COST
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><img style="width:102px" class="text-center"
                                            src="<?php echo e(asset('assets/img/' . $value->product_image)); ?>">
                                    </td>
                                    <td class="text-center" style="width: 5%"><?php echo e($value->product_name); ?></td>
                                    <td class="text-center" style="width: 5%"><?php echo e($value->type_name); ?></td>
                                    <td class="text-center" style="width: 30%">
                                        <?php echo e(number_format($value->discount_price, 0, ',', '.')); ?> đ</td>
                                    <td class="text-center">x <?php echo e($value->product_quantity); ?></td>
                                    <td style="width: 15%"><?php echo e(number_format($value->cost, 0, ',', '.')); ?> đ</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/admin/orderdetails/index.blade.php ENDPATH**/ ?>