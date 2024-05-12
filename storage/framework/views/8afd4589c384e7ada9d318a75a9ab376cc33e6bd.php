

<?php $__env->startSection('content'); ?>
    <!-- Site wrapper -->

    <div class="wrapper">

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">

                            <h1>Edit Comments</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>

                                <li class="breadcrumb-item active">Edit Comments</li>

                            </ol>

                        </div>

                    </div>

                </div><!-- /.container-fluid -->

            </section>



            <!-- Main content -->

            <section class="content">


                <form action="/admin/comments/<?php echo e($comment->comm_id); ?>" method="POST" enctype="multipart/form-data">

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

                                        <label for="inputID">ID</label>

                                        <input readonly value="<?php echo e($comment->comm_id); ?>" type="text" id="inputID"
                                            class="form-control" name="id">

                                    </div>


                                    <div class="form-group">
                                        <label for="inputType">Status</label>
                                        <select id="inputType" class="form-control custom-select" name="status" required>
                                            <option selected disabled>Select one</option>
                                            <option value="1">Approved</option>
                                            <option value="0">Pending Approved</option>
                                        </select>
                                    </div>

                                    <div class="form-group">

                                        <label for="inputDescription">Comment</label>

                                        <textarea readonly name="desc" class="form-control" rows="4"><?php echo e($comment->comment); ?></textarea>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12">

                            <input type="submit" name="submit" value="Apply change" class="btn btn-success float-right">

                        </div>

                    </div>

                </form>

            </section>

        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\khoaluanchuyennganh\code\TLCN_Laravel\resources\views/admin/comments/update.blade.php ENDPATH**/ ?>