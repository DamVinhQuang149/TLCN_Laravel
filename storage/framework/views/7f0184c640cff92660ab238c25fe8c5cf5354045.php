<?php if(Session::has('Cart') != null): ?>

    <table cellspacing="0" class="shop_table cart">
        <thead>
            <tr>
                <th class="product-image">ảnh</th>
                <th class="product-name">sản phẩm</th>
                <th class="product-price">giá</th>
                <th class="product-quantity">số lượng</th>
                <th class="remain_quantity">Tồn kho</th>
                <th class="product-subtotal">tổng giá</th>
                <th class="product-remove">Xóa</th>
                <th class="product-save">Sửa</th>
            </tr>
        </thead>
        <?php $__currentLoopData = Session::get('Cart')->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($inventory->product_id === $item['productInfo']->id): ?>
                        <tbody>
                            <tr class="cart_item">
                                <td class="product-image">
                                    <a
                                        href="<?php echo e(route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id])); ?>">
                                        <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                                            src="<?php echo e(asset('assets/img/' . $item['productInfo']->pro_image)); ?>">
                                    </a>
                                </td>
                                <td class="product-name" style="max-width: 440px;">
                                    <a
                                        href="<?php echo e(route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id])); ?>">
                                        <strong><?php echo e($item['productInfo']->name); ?></strong>
                                    </a>
                                </td>

                                <td class="product-price">
                                    <span class="amount"><strong><?php echo e(number_format($item['price1'])); ?>VND</strong></span>
                                </td>

                                <td class="product-quantity">
                                    <div class="quantity buttons_added">
                                        <strong>
                                            <input id="quanty-item-<?php echo e($item['productInfo']->id); ?>"
                                                style="border-color: #000; border-radius: 4px; padding: 5px; width: 40px; text-align: center;"
                                                type="number" min="1" max=<?php echo e($inventory->remain_quantity); ?>

                                                class="input-text qty text" title="Qty"
                                                value="<?php echo e($item['quanty']); ?>">
                                        </strong>
                                    </div>
                                </td>
                                <td class="reamain-quantity">

                                    <span class="amount">
                                        <strong><?php echo e($inventory['remain_quantity']); ?>

                                        </strong>
                                    </span>

                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">
                                        <strong><?php echo e(number_format($item['price'])); ?>

                                            VND</strong>
                                    </span>
                                </td>
                                <td class="product-remove">
                                    <a title="Save this item" class="product-save"
                                        style="text-decoration: none;border:1px solid #000; padding:9px; border-radius:6px"
                                        onclick="DeleteListItemCart(<?php echo e($item['productInfo']->id); ?>)"
                                        href="javascript:">
                                        Xóa
                                    </a>
                                </td>
                                <td class="product-save">
                                    <a title="Save this item" class="product-save"
                                        style="text-decoration: none;border:1px solid #000; padding:9px; border-radius:6px"
                                        href="javascript:" onclick="SaveListItemCart(<?php echo e($item['productInfo']->id); ?>)">
                                        Cập nhật
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="actions" colspan="7">
                <div class="add-to-cart">
                    <button class="add-to-cart-btn">
                        <a style="text-decoration: none;" href="<?php echo e(route('view.checkout')); ?>">
                            <i class="fa fa-credit-card"></i> Thanh toán
                        </a>
                    </button>
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
                                    <?php echo e(number_format(Session::get('Cart')->totalPrice)); ?>

                                    VND
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

                <th class="remain_quantity">Tồn kho</th>

                <th class="product-subtotal">tổng giá</th>

                <th class="product-remove">Xóa</th>

                <th class="product-save">Sửa</th>

            </tr>

        </thead>

        <tr>

            <td class="actions" colspan="9">

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

<?php endif; ?>
<?php /**PATH D:\khoaluanchuyennganh\code\02_04_2024\TLCN_Laravel\resources\views/list-item-cart.blade.php ENDPATH**/ ?>