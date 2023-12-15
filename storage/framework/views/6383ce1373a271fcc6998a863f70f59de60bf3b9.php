<div class="order-col">
    <?php if(Session::has("Coupon") == null): ?>
    <div style="width:50%">
        <strong>Nhập mã giảm giá:</strong>
    </div>
    <div style="width:30%">
        <input style="border: 2px dashed #000; border-radius: 4px; padding: 9px;" type="text" id="coupon-code"
            name="coupon-code" placeholder="Nhập mã giảm giá">
    </div>
    <div style="width:20%">
        <button type="button" id="applyCouponButton"
            style="background-color: #FE9705; color: #fff; border: none; border-radius: 4px; padding: 9px; cursor: pointer;"
            onclick="addCoupon()">
            <strong>
                Áp dụng
            </strong>
        </button>
    </div>
    <?php else: ?>
    <div style="width:50%">
        <strong></strong>
    </div>
    <div style="width:30%">
        <input hidden="border: 2px dashed #000; border-radius: 4px; padding: 9px;" type="text" id="coupon-code"
            name="coupon-code" placeholder="Nhập mã giảm giá">
    </div>
    <div style="width:20%">
        <a href="<?php echo e(route('unset.coupon')); ?>">
            <!-- Thay 'ten_route' bằng tên route hoặc URL bạn muốn liên kết đến -->
            <button type="button" id="applyCouponButton"
                style="background-color: #FE9705; color: #fff; border: none; border-radius: 4px; padding: 9px; cursor: pointer;">
                <strong>
                    Xóa mã
                </strong>
            </button>
        </a>
    </div>
    <?php endif; ?>
</div>
<div>
    <?php if(Session::has('Coupon')): ?>
        <?php $__currentLoopData = Session::get('Coupon'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cou['coupon_remain'] > 0): ?>
                <?php if($cou['min_order'] < Session::get('Cart')->totalPrice): ?>
                    <div class="alert alert-success">
                        Mã giảm giá: <?php echo e($cou['coupon_code']); ?> được áp dụng thành công.
                    </div>
                    <div class="order-col" style="margin-top:12px">
                       
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger">Giá trị đơn hàng chưa đáp ứng, tối thiểu là:
                        <span style="font-weight: 700;"><?php echo e(number_format($cou['min_order'])); ?>

                            đ</span>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="alert alert-danger">Số lượng mã giảm giá <?php echo e($cou['coupon_code']); ?> đã hết.</div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <div class="alert alert-danger">Mã giảm giá không hợp lệ!</div>
    <?php endif; ?>
</div><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/laravel/resources/views/couponajax.blade.php ENDPATH**/ ?>