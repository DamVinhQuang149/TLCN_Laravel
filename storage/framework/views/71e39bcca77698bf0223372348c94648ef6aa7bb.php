

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products Flash Sales</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">

                    <h3 class="card-title">There are <?php echo e($all->count()); ?> Products Flash Sales</h3>


                    <div class="card-tools">
                        <a class="btn btn-sm bg-green" href="flashsales/create">
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
                                <th style="width: 15%" class="text-center">
                                    FlashSales ID
                                </th>
                                <th style="width: 15%" class="text-center">
                                    Product Name
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Image
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Product ID
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Sales Price
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Sales Rate
                                </th>
                                <th style="width: 15%" class="text-center">
                                    Start Date
                                </th>
                                <th class="text-center" style="width: 15%">
                                    End Date
                                </th>

                                <th style="width: 5%" class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $flashsales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($value->product_id === $pro->id): ?>
                                        <tr>
                                            <td style="text-align:center; width:15%">#<?php echo e($value['id']); ?></td>
                                            <td style="width:15%" class="text-center"><?php echo e($pro['name']); ?></td>
                                            <td style="width:5%">
                                                <a rel="stylesheet" href="/admin/products/<?php echo e($value->product_id); ?>/edit">
                                                    <img style="width:50px"
                                                        src="<?php echo e(asset('assets/img/' . $pro['pro_image'])); ?>"alt="">
                                                </a>
                                            </td>
                                            <td style="width:10%" class="text-center">#<?php echo e($value['product_id']); ?></td>
                                            <td style="width:10%" class="text-center">
                                                <?php echo e(number_format($pro['discount_price'])); ?>đ</td>
                                            <td style="width:10%" class="text-center">
                                                <?php echo e((1 - $pro['discount_price'] / $pro['price']) * 100); ?>%</td>
                                            <td style="width:15%" class="text-center"><?php echo e($value['start_date']); ?></td>
                                            <td style="width:15%" class="text-center"><?php echo e($value['end_date']); ?></td>
                                            <td style="width:5%" class="project-actions text-right">
                                                <form action="flashsales/<?php echo e($value->id); ?>/edit" method="POST"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('GET'); ?>
                                                    <button type="submit" class="btn btn-info btn-sm"
                                                        style="margin-bottom: 10px;">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Update
                                                    </button>
                                                </form>

                                                <form action="flashsales/<?php echo e($value->id); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>

                                                    <?php echo method_field('DELETE'); ?>

                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        style="margin-top:6px" onclick="confirmDelete(event)">

                                                        <i class="fas fa-trash"></i> Delete

                                                    </button>

                                                </form>
                                            </td>

                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        <?php echo e($flashsales->render('/admin/pagination')); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/admin/flashsales/index.blade.php ENDPATH**/ ?>