

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card h-auto">
                <div class="card-header">
                    <h3 style="padding-top:30px;">Quên mật khẩu</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><a href="https://www.facebook.com/" target="_blank" style="color:#FFC312"><i class="fab fa-facebook-square"></i></a></span>
                        <span><a href="https://www.google.com/" target="_blank" style="color:#FFC312"><i class="fab fa-google-plus-square"></i></a></span>
                        <span><a href="https://twitter.com/" target="_blank" style="color:#FFC312"><i class="fab fa-twitter-square"></i></a></span>
                    </div>
                </div>
                <div class="mt-5">
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
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Gửi" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">

                    <div class="d-flex justify-content-center links">
                        Bạn muốn quay lại?<a href="<?php echo e(route('login')); ?>">Quay lại đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.applogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/resources/views/login/forget-password.blade.php ENDPATH**/ ?>