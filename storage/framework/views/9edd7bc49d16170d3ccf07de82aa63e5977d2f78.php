
<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
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
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools">
                        <a class="btn btn-sm bg-green" href="products/create">
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
                                <th style="width: 1%">
                                    Product_id
                                </th>
                                <th style="width: 15%">
                                    Name
                                </th>
                                <th style="width: 5%">
                                    Image
                                </th>
                                <th style="width: 25%">
                                    Description
                                </th>
                                <th style="width: 8%">
                                    Price
                                </th>
                                <th style="width: 8%">
                                    Discount price
                                </th>
                                <th style="width: 3%">
                                    Manufactures
                                </th>
                                <th style="width: 6%">
                                    Protype
                                </th>
                                <th style="width: 3%">
                                    Feature
                                </th>
                                <th style="width: 8%">
                                    Created_at
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="text-align:center"><?php echo e($value['id']); ?></td>
                                    <td><?php echo e($value['name']); ?></td>
                                    <td><img style="width:50px"
                                            src="<?php echo e(asset('assets/img/' . $value['pro_image'])); ?>"alt=""></td>
                                    <td class="project_progress">
                                        <?php if(strlen($value['description']) > 120): ?>
                                            <?php echo e(substr($value['description'], 0, 120)); ?><a style="color: black;">...</a>
                                        <?php else: ?>
                                            <?php echo e($value['description']); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(number_format($value['price'])); ?>đ</td>
                                    <td><?php echo e(number_format($value['discount_price'])); ?>đ</td>
                                    <td class="project_progress">
                                        <?php echo e($value['manu_name']); ?>

                                    </td>
                                    <td class="project-state">
                                        <?php echo e($value['type_name']); ?>

                                    </td>
                                    <td class="project-state">
                                        <?php if($value['feature'] == 1): ?>
                                            <?php echo e('Nổi bật'); ?>

                                        <?php else: ?>
                                            <?php echo e('Không nổi bật'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="project-state">
                                        <?php echo e($value['created_at']); ?>

                                    </td>
                                    <td class="project-actions text-right">
                                        <form action="products/<?php echo e($value->id); ?>/edit" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-info btn-sm" style="margin-bottom: 10px;">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Update
                                            </button>
                                        </form>
                                        <form action="products/<?php echo e($value->id); ?>" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm"
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
                        <?php echo e($products->render('/admin/pagination')); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/admin/products/index.blade.php ENDPATH**/ ?>