

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        <h1>Roles</h1>

                    </div>

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>

                            <li class="breadcrumb-item active">Roles</li>

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

                    <h3 class="card-title">Roles</h3>



                    <div class="card-tools">

                        <a class="btn  btn-sm bg-green" href="roles/create">

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

                                <th style="width: 40%">

                                    Role ID

                                </th>

                                <th style="width: 40%">

                                    Role Name

                                </th>

                                <th style="width: 5%">

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td>#<?php echo e($value->role_id); ?></td>

                                    <td><?php echo e($value->role_name); ?></td>

                                    <td class="project-actions text-right" style="width:5%">

                                        <form action="roles/<?php echo e($value->role_id); ?>/edit" method="POST"
                                            enctype="multipart/form-data">

                                            <?php echo csrf_field(); ?>

                                            <?php echo method_field('GET'); ?>

                                            <button type="submit" class="btn btn-info btn-sm">

                                                <i class="fas fa-pencil-alt">

                                                </i>

                                                Update

                                            </button>

                                        </form>

                                        <form action="roles/<?php echo e($value->role_id); ?>" method="POST"
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

                </div>

            </div>

        </section>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\khoaluanchuyennganh\code\codenew\TLCN_Laravel\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>