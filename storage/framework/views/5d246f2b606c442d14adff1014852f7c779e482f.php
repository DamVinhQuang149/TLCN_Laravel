<?php if(Session::has("Cart") != null): ?>

<div class="cart-list">
    <?php $__currentLoopData = Session::get('Cart')->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="product-widget">
        <div class="product-img">
            <img class="si-pic" src="<?php echo e(asset('assets/img/' . $item['productInfo']->pro_image)); ?>" alt="">
        </div>
        <div class="product-body">
            <h3 class="product-name">
                <a
                    href="<?php echo e(route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id])); ?>">
                    <?php echo e($item['productInfo']->name); ?>

                </a>
            </h3>
            <h4 class="product-price"><span class="qty"><?php echo e($item['quanty']); ?></span> x <?php echo e(number_format($item['price1'])); ?> VND</h4>
        </div>
        <button class="delete">
            <i class="fa fa-close" data-id="<?php echo e($item['productInfo']->id); ?>"></i>
        </button>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="cart-summary">
    <small> <?php echo e(Session::get('Cart')->totalQuanty); ?> Sản phẩm </small>
    <h5>SUBTOTAL: <?php echo e(number_format(Session::get('Cart')->totalPrice)); ?> VND</h5>
    <input hidden id="total-quanty-cart" type="number" value="<?php echo e(Session::get('Cart')->totalQuanty); ?>">
</div>
<?php endif; ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/cart-items.blade.php ENDPATH**/ ?>