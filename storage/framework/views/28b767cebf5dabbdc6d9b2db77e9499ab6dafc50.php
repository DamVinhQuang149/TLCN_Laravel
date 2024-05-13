<div id="total-price">
    <div class="order-col">
        <div>
            <?php
                if (Session::has('shipping_fee')) {
                    if (Session::has('Coupon')) {
                        $total_coupon = Session::get('Cart')->totalPrice - $coupon_amount;
                    } else {
                        $total_coupon = Session::get('Cart')->totalPrice;
                    }
                    if (Session::get('Cart')->totalPrice >= 300000) {
                        $total_coupon += 0;
                    } else {
                        $total_coupon += Session::get('shipping_fee.fee');
                    }
                } else {
                    if (Session::has('Coupon')) {
                        $total_coupon = Session::get('Cart')->totalPrice - $coupon_amount;
                    } else {
                        $total_coupon = Session::get('Cart')->totalPrice;
                    }
                }

                Session::put('total_coupon', $total_coupon);
            ?>
            <h4 name=total><?php echo e(number_format($total_coupon, 0, ',', '.')); ?> đ</h4>
            <input type="hidden" name="total" value="<?php echo e($total_coupon); ?>">
        </div>
    </div>
</div>
<?php /**PATH D:\khoaluanchuyennganh\code\codenew\TLCN_Laravel\resources\views/ajax/ajax_total_price.blade.php ENDPATH**/ ?>