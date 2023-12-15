<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <div class="col-12">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger"><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
    <?php if(session()->has('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="container">
        <div class="main-body" style="margin-top: 20px;">
            <form action="">
                <div class="row gutters-sm justify-content-center">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <?php if($user->image): ?>
                                        <img src="<?php echo e(asset('htdocs/public/assets/img/' . $user->image)); ?>" class="rounded-circle" width="150">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('htdocs/public/assets/img/avatar3.jpg')); ?>" class="rounded-circle" width="150">
                                    <?php endif; ?>
                                    <div class="mt-3">
                                        <h4><?php echo e($user->First_name); ?> <?php echo e($user->Last_name); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Họ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo e($user->First_name); ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tên</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo e($user->Last_name); ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tên tài khoản</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo e($user->username); ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Điện thoại</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo e($user->phone); ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo e($user->email); ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Quyền</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo e($user->role->role_name); ?>

                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <a style="background-color: #f75e00;" class="btn btn-reorder"
                                            href="<?php echo e(route('editprofile', ['user_id' => $user->user_id])); ?>"><strong>Sửa</strong>
                                            <i class="fa fa-pencil"></i></a>
                                        <a style="background-color: #80bb35;" class="btn btn-reorder"
                                            href="orders.php"><strong>Xem đơn hàng</strong> <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/laravel/resources/views/profile.blade.php ENDPATH**/ ?>