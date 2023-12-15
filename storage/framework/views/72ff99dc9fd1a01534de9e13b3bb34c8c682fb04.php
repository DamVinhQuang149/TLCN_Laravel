<!DOCTYPE html>
<html>
<head>
    <title>láy lại mật khẩu</title>
</head>
<body>

<p>Bạn nhận được thư này, do bạn hoặc ai đó yêu cầu mật khẩu mới từ website Capple...</p>
<p> Mật khẩu mới của bạn là: <?php echo e($resetPW); ?></p>
<a href="<?php echo e(route('reset.password')); ?>">click vào đây để đổi mật khẩu!</a>
</body>
</html><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/emails/forget-password.blade.php ENDPATH**/ ?>