

<?php $__env->startSection('content'); ?>
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">

                            <h1>Edit Inventory</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>

                                <li class="breadcrumb-item active">Edit Inventory's Products</li>

                            </ol>

                        </div>

                    </div>

                </div><!-- /.container-fluid -->

            </section>



            <!-- Main content -->

            <section class="content">

                <?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/admin/inventories/<?php echo e($value->inventory_id); ?>" method="POST"
                        enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>

                        <?php echo method_field('PUT'); ?>

                        <div class="row">

                            <div class="col-md-12">



                                <div class="card card-primary">

                                    <div class="card-header">

                                        <h3 class="card-title">General</h3>



                                        <div class="card-tools">

                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">

                                                <i class="fas fa-minus"></i>

                                            </button>

                                        </div>

                                    </div>

                                    <div class="card-body">

                                        <div class="form-group">

                                            <label for="inputName">Inventory ID</label>

                                            <input readonly value="<?php echo e($value->inventory_id); ?>" type="text" id="inputID"
                                                class="form-control" name="manu_id">

                                        </div>

                                        <div class="form-group">

                                            <label for="inputName">Import quantity</label>

                                            <input value="<?php echo e($value->import_quantity); ?>" type="text" id="inputName"
                                                class="form-control" name="import_quantity">

                                        </div>

                                    </div>

                                    <!-- /.card-body -->

                                </div>

                                <!-- /.card -->

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12">

                                <input type="submit" name="submit" value="Apply change"
                                    class="btn btn-success float-right">

                            </div>

                        </div>

                    </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </section>

            <!-- /.content -->

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\khoaluanchuyennganh\code\02_04_2024\TLCN_Laravel\resources\views/admin/inventories/update.blade.php ENDPATH**/ ?>