<div class="order-col" id="change-shipping-fee">

    <?php if(Session::has('shipping_fee')): ?>
        
        <div>
            <strong>Phí ship:</strong>
            <strong class="order-cash-ship">
                <?php echo e(number_format(Session::get('shipping_fee'), 0, ',', '.')); ?> đ
            </strong>
        </div>
        <div>
            <strong class="order-cash-ship">
                <?php echo e(number_format(Session::get('shipping_fee'), 0, ',', '.')); ?> đ
            </strong>
        </div>
        
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/shipping_info.blade.php ENDPATH**/ ?>