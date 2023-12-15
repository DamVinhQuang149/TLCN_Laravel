<?php if(Session::has("Cart") != null): ?>
<table cellspacing="0" class="shop_table cart">
    <thead>
        <tr>
            <th class="product-image">ảnh</th>
            <th class="product-name">sản phẩm</th>
            <th class="product-price">giá</th>
            <th class="product-quantity">số lượng</th>
            <th class="product-subtotal">tổng giá</th>
            <th class="product-remove">Xóa</th>
            <th class="product-save">Sửa</th>
        </tr>
    </thead>
    <?php $__currentLoopData = Session::get('Cart')->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tbody>
        <tr class="cart_item">
            <td class="product-image">
                <a href="<?php echo e(route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id])); ?>">
                    <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                    src="<?php echo e(asset('assets/img/' . $item['productInfo']->pro_image)); ?>">
                </a>
            </td>
            <td class="product-name" style="max-width: 440px;">
                <a href="<?php echo e(route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id])); ?>">
                    <strong><?php echo e($item['productInfo']->name); ?></strong>
                </a>
            </td>

            <td class="product-price">
                <span
                    class="amount"><strong><?php echo e(number_format($item['price'])); ?>VND</strong></span>
            </td>

            <td class="product-quantity">
                <div class="quantity buttons_added">
                    <strong>
                        <input id="quanty-item-<?php echo e($item['productInfo']->id); ?>" style="border-color: #000; border-radius: 4px; padding: 5px; width: 40px; text-align: center;"
                            type="number" min="1" class="input-text qty text" title="Qty"
                            value="<?php echo e($item['quanty']); ?>">
                    </strong>
                </div>
            </td>
            <td class="product-subtotal">
                <span class="amount">
                    <strong><?php echo e(number_format($item['price1'])); ?> VND</strong>
                </span>
            </td>
            <td class="product-remove">
                <a title="Save this item" class="product-save" onclick="DeleteListItemCart(<?php echo e($item['productInfo']->id); ?>)" href="javascript:">
                    Xóa
                </a>
            </td>
            <td class="product-save">
                <a title="Save this item" class="product-save" href="" onclick="SaveListItemCart(<?php echo e($item['productInfo']->id); ?>)">
                    Lưu
                </a>
            </td>
        </tr>
    </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="actions" colspan="7">
            <div class="add-to-cart">
                <button class="add-to-cart-btn">
                    <a style="text-decoration: none;" href="">
                        <i class="fa fa-credit-card"></i> Thanh toán
                    </a>
                </button>';
            </div>
        </td>
    </tr>
</table>
<div class="cart-collaterals">
    <div class="cart_totals col-lg-offset-4">
        <table cellspacing="0">
            <tbody>
                <tr class="order-total">
                    <th>Tổng</th>
                    <td>
                        <strong>
                            <span class="amount">
                                <?php echo e(number_format(Session::get('Cart')->totalPrice)); ?> VND
                            </span>
                        </strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php else: ?>
<table cellspacing="0" class="shop_table cart">
    <thead>
        <tr>
            <th class="product-image">ảnh</th>
            <th class="product-name">sản phẩm</th>
            <th class="product-price">giá</th>
            <th class="product-quantity">số lượng</th>
            <th class="product-subtotal">tổng giá</th>
            <th class="product-remove">Xóa</th>
            <th class="product-save">Sửa</th>
        </tr>
    </thead>
    <tr>
        <td class="actions" colspan="7">
            <div class="add-to-cart">
                <strong>Giỏ hàng của bạn hiện đang trống</strong>
            </div>
        </td>
    </tr>
</table>
<div class="cart-collaterals">
    <div class="cart_totals col-lg-offset-4">
        <table cellspacing="0">
            <tbody>
                <tr class="order-total">
                    <th>Tổng</th>
                    <td>
                        <strong>
                            <span class="amount">
                                0 VND
                            </span>
                        </strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/list-item-cart.blade.php ENDPATH**/ ?>