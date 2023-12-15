
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                    <div class="card-tools">
                        <a class="btn  btn-sm bg-green" href="users/create">
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
                                <th style="width: 3%">
                                    User_id
                                </th>
                                <th style="width: 10%">
                                    Image
                                </th>
                                <th style="width: 14%">
                                    First name
                                </th>
                                <th style="width: 30%">
                                    Last name
                                </th>
                                <th style="width: 10%">
                                    Phone
                                </th>
                                <th style="width: 6%">
                                    Username
                                </th>
                                <th style="width: 5%;">
                                    Password
                                </th>
                                <th style="width: 10%;text-align:center">
                                    Role
                                </th>
                                <th style="width: 5%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="width:3%"><?php echo e($value->user_id); ?></td>
                                    <td style="width:10%"><img style="width:50px;border-radius:9px"
                                            src="<?php echo e(asset('assets/img/' . $value->image)); ?>" alt=""></td>
                                    <td style="width:14%"><?php echo e($value->First_name); ?></td>
                                    <td style="width:30%"><?php echo e($value->Last_name); ?></td>
                                    <td style="width:10%"><?php echo e($value->phone); ?></td>
                                    <td style="width:6%"><?php echo e($value->username); ?></td>
                                    <td style="width:5%"><?php echo e(substr($value->password, 0, 40) . '...'); ?></td>
                                    <td style="text-align:center;width:10%"><?php echo e($value->role_name); ?></td>
                                    <td class="project-actions text-right" style="width:5%">
                                        <form action="users/<?php echo e($value->user_id); ?>/edit" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('GET'); ?>
                                            <button type="submit" class="btn btn-info btn-sm" style="margin-bottom: 10px;">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Update
                                            </button>
                                        </form>
                                        <form action="users/<?php echo e($value->user_id); ?>" method="POST"
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
                        <?php echo e($users->render('/admin/pagination')); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/laravel/resources/views/admin/users/index.blade.php ENDPATH**/ ?>