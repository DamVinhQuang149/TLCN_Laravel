

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Inventory</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Inventory</li>
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
                    <h3 class="card-title">There are <?php echo e($productAll->count()); ?> Products </h3>


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
                                <th style="width: 1%">
                                    Inventory_ID
                                </th>
                                <th style="width: 15%">
                                    Product_name
                                </th>
                                <th style="width: 5%">
                                    Image
                                </th>
                                <th style="width: 10%">
                                    Product_ID
                                </th>
                                <th style="width: 10%">
                                    Initial import
                                </th>
                                <th class="text-center" style="width: 13%">
                                    Sold_quantity
                                </th>
                                <th style="width: 3%">
                                    Remain_quantity
                                </th>
                                <th style="width: 6%">
                                    Inventory_Status
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="text-align:center; width:1%">#<?php echo e($value['inventory_id']); ?></td>
                                    <td style="width:15%"><?php echo e($value['product_name']); ?></td>
                                    <td style="width:5%">
                                        <a rel="stylesheet" href="/admin/products/<?php echo e($value->product_id); ?>/edit">
                                            <img style="width:50px"
                                                src="<?php echo e(asset('assets/img/' . $value['product_image'])); ?>"alt="">
                                        </a>
                                    </td>
                                    <td style="width:10%" class="text-center">#<?php echo e($value['product_id']); ?></td>
                                    <td style="width:8%" class="text-center"><?php echo e($value['import_quantity']); ?></td>
                                    <td style="width:13%" class="text-center"><?php echo e($value['sold_quantity']); ?></td>
                                    <td style="width:3%" class="text-center"><?php echo e($value['remain_quantity']); ?></td>
                                    <td style="width:6%" class="text-center"><?php echo e($value['inventory_status']); ?></td>
                                    <td style="width:5%" class="project-actions text-right">
                                        <form action="inventories/<?php echo e($value->inventory_id); ?>/edit" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-info btn-sm" style="margin-bottom: 10px;">
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
                        <?php echo e($inventories->render('/admin/pagination')); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\khoaluanchuyennganh\code\codenew\TLCN_Laravel\resources\views/admin/inventories/index.blade.php ENDPATH**/ ?>