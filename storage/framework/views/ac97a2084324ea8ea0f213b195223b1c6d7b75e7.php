<?php $__env->startSection('content'); ?>

    <body>
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <?php if($user->image): ?>
                                        <img src="<?php echo e(asset('assets/img/' . $user->image)); ?>" class="rounded-circle"
                                            width="150">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/img/avatar3.jpg')); ?>" class="rounded-circle"
                                            width="150">
                                    <?php endif; ?>
                                    <div class="mt-3">
                                        <h4><?php echo e($user->First_name); ?> <?php echo e($user->Last_name); ?></h4>
                                        <a href="<?php echo e(route('changeimage', ['user_id' => $user->user_id])); ?>"><button class="btn btn-primary" style="background-color: #80bb35;">Đổi                                                   ảnh</button></a>
                                        <a href="<?php echo e(route('reset.password')); ?>">
                                            <button class="btn btn-primary" style="background-color: #80bb35;">
                                                Đổi mật khẩu
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <form action="<?php echo e(route('editprofile.post')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Họ</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input required type="text" class="form-control" name="First_name"
                                                value="<?php echo e($user->First_name); ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tên</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input required type="text" name="Last_name" class="form-control"
                                                value="<?php echo e($user->Last_name); ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Số điện thoại</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input required type="text" name="phone" class="form-control"
                                                value="<?php echo e($user->phone); ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Địa chỉ nhận hàng</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input required type="text" name="address" class="form-control"
                                                value="<?php echo e($user->address); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="submit" name="submit" value="Lưu thay đổi"
                                                class="btn btn-primary px-4" style="background-color: #80bb35;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/resources/views/edit-profile.blade.php ENDPATH**/ ?>