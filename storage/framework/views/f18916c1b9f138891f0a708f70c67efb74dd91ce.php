<?php $__env->startSection('content'); ?>
    <div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card h-auto">
				<div class="card-header">
					<h3>Đăng ký</h3>
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
						<?php echo method_field('POST'); ?>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="First_name" class="form-control" placeholder="Họ" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="Last_name" class="form-control" placeholder="Tên" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control" placeholder="Tài khoản" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="passwordAgain" class="form-control" placeholder="Nhập lại mật khẩu" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control" placeholder="Email" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-phone"></i></span>
							</div>
							<input type="phone" name="phone" class="form-control" placeholder="Số điện thoại" required>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Đăng ký" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">

					<div class="d-flex justify-content-center links">
						Đã có tài khoản?<a href="login">Đăng nhập</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="forget-password">Quên mật khẩu?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.applogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/resources/views/login/register.blade.php ENDPATH**/ ?>