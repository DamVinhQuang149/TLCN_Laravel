
<?php $__env->startSection('content'); ?>
    <div class="section">
        <div class="container">
            <div class="row">
                <form id="orderForm" action="<?php echo e(route('order')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                    <div>
                        <h2 class="title" style="border-radius:6px; margin-left:15px">Thanh toán</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="billing-details" style="border-top: 1px solid #ccc">
                            <div class="section-title">
                                <h3 class="title" style="border-radius:6px;">Thông tin người nhận</h3>
                            </div>
                            <div class="form-group">
                                <h5>Họ & tên*</h5>
                                <input class="input" type="text" name="full_name" placeholder="Full Name"
                                    value="<?php echo e(Auth::user()->First_name); ?> <?php echo e(Auth::user()->Last_name); ?>" readonly>
                            </div>

                            <h5>Địa chỉ nhận hàng mặc định* (Cập nhật tại trang cá nhân)</h5>
                            <div class="form-group">
                                <input class="input" type="text" id="address" name="address"
                                    placeholder="Địa chỉ nhận hàng" value="<?php echo e(Auth::user()->address); ?>" required>
                            </div>
                            <div style="width:30%" class="form-group">
                                <button type="button" id="applyCouponButton"
                                    style="background-color: #FE9705; color: #fff; border: none; border-radius: 4px; padding: 9px; cursor: pointer;"
                                    onclick="shippingFee()">
                                    <strong>
                                        Tính phí ship
                                    </strong>
                                </button>
                            </div>
                            <div id="shipping_error"></div>
                            
                            <h5>Số điện thoại*</h5>
                            <div class="form-group">
                                <input class="input" type="tel" name="phone" placeholder="Điện thoại"
                                    value="0<?php echo e(Auth::user()->phone); ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="order-notes">
                                    <h5>Ghi chú</h5>
                                    <textarea style="height: 115px; width: 555px" class="input"
                                        placeholder="Thông điệp bánh ngọt ví dụ: 'Chúc mừng sinh nhật'" name="note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row-md-5 order-details">
                            <div class="section-title text-center">
                                <h3 class="title" style="border-radius:6px;">Đơn hàng của bạn</h3>
                            </div>
                            <div class="order-summary">
                                <div class="order-products">
                                    <?php if(Session::has('Cart') != null): ?>
                                        <?php $__currentLoopData = Session::get('Cart')->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="order-col">
                                                <h5><img width="145" height="145" alt="poster_1_up"
                                                        class="shop_thumbnail"
                                                        src="<?php echo e(asset('assets/img/' . $item['productInfo']->pro_image)); ?>">
                                                    x <?php echo e($item['quanty']); ?>

                                                </h5>
                                                <div style="width:60%">
                                                    <strong>
                                                        <?php echo e($item['productInfo']->name); ?>

                                                        <div></div>
                                                        <?php echo e(number_format($item['price1'], 0, ',', '.')); ?> đ
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="order-col">
                                                <div>
                                                    <strong>Tạm tính:</strong>
                                                </div>
                                                <div>
                                                    <strong class="order-cash-total">
                                                        <?php echo e(number_format($item['price'], 0, ',', '.')); ?> đ
                                                    </strong>
                                                </div>
                                            </div>
                                            <hr style="border-color: #ccc">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="order-col">
                                            <div>
                                                <strong>Tiền hàng:</strong>
                                            </div>
                                            <div>
                                                <strong class="order-cash-total">
                                                    <?php echo e(number_format(Session::get('Cart')->totalPrice, 0, ',', '.')); ?> đ
                                                </strong>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div id="fee-result" style="margin-top:18px">
                                        <?php if(Session::has('shipping_fee')): ?>
                                            <?php if(Session::get('shipping_fee.distance') > 2 && Session::get('shipping_fee.distance') < 25): ?>
                                                <div
                                                    style="border: 2px solid #FE9705; border-radius:6px; padding:10px; padding-right:20px;
                                        padding-left:20px">
                                                    <div class="order-col">
                                                        <div class="order-col">
                                                            <strong>Giao đến </strong> <i class="fa fa-map-marker"></i>
                                                            :
                                                        </div>
                                                        <div class="order-col" style="width:80%">
                                                            <strong class="order-cash-ship">
                                                                <strong class="order-cash-ship">
                                                                    <p>
                                                                        <?php echo e(Session::get('shipping_fee.address')); ?></p>
                                                                </strong>
                                                            </strong>
                                                        </div>
                                                    </div>
                                                    <div class="order-col">
                                                        <div class="order-col">
                                                            <strong>Khoảng cách </strong> <i class="fa fa-truck"></i> :
                                                        </div>
                                                        <div class="order-col">
                                                            <strong class="order-cash-ship">
                                                                <strong class="order-cash-ship">
                                                                    <p><?php echo e(Session::get('shipping_fee.distance')); ?> km
                                                                    </p>
                                                                </strong>
                                                            </strong>
                                                        </div>
                                                    </div>
                                                    <div class="order-col">
                                                        <div class="order-col">
                                                            <strong>Thời gian ước tính</strong> <i
                                                                class="fa fa-clock-o"></i> :
                                                        </div>
                                                        <div class="order-col">
                                                            <strong class="order-cash-ship">
                                                                <strong class="order-cash-ship">
                                                                    <p><?php
                                                                        $durationInMinutes = Session::get(
                                                                            'shipping_fee.duration',
                                                                        );
                                                                        $hours = floor($durationInMinutes / 60);
                                                                        $minutes = $durationInMinutes % 60;
                                                                    ?>

                                                                    <p>
                                                                        <?php if($hours > 0): ?>
                                                                            <?php echo e($hours); ?> giờ
                                                                        <?php endif; ?>
                                                                        <?php if($minutes > 0): ?>
                                                                            <?php echo e($minutes); ?> phút
                                                                        <?php endif; ?>
                                                                    </p>
                                                                    </p>
                                                                </strong>
                                                            </strong>
                                                        </div>
                                                    </div>
                                                    <div class="order-col" style="margin-top:6px">
                                                        <div class="order-col">
                                                            <strong>Phí vận chuyển</strong> <i class="fa fa-money"></i>
                                                            :
                                                        </div>

                                                        <div class="order-col" style="width:60%">
                                                            <strong class="order-cash-ship">
                                                                <?php if(Session::get('Cart')->totalPrice >= 300000): ?>
                                                                    <p>Miễn phí khi tiền hàng từ 300.000đ
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p><?php echo e(number_format(Session::get('shipping_fee.fee'), 0, ',', '.')); ?>

                                                                        đ</p>
                                                                <?php endif; ?>
                                                            </strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>

                                    <div id="change-coupon" style="margin-top:18px">
                                        <div class="order-col">
                                            <?php if(Session::has('Coupon') == null): ?>
                                                <div style="width:50%">
                                                    <strong>Nhập mã giảm giá:</strong>
                                                </div>
                                                <div style="width:30%">
                                                    <input
                                                        style="border: 2px dashed #000; border-radius: 4px; padding: 9px;"
                                                        type="text" id="coupon-code" name="coupon-code"
                                                        placeholder="Nhập mã giảm giá">
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
                                                    <input
                                                        hidden="border: 2px dashed #000; border-radius: 4px; padding: 9px;"
                                                        type="text" id="coupon-code" name="coupon-code"
                                                        placeholder="Nhập mã giảm giá">
                                                </div>
                                                <div style="width:20%">
                                                    <a href="<?php echo e(route('unset.coupon')); ?>">
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
                                                    <?php
                                                        $coupon_amount = 0;
                                                    ?>
                                                    <?php if($cou['coupon_remain'] > 0): ?>
                                                        <?php
                                                            $coupon_amount = 0;
                                                        ?>
                                                        <?php if($cou['min_order'] < Session::get('Cart')->totalPrice): ?>
                                                            <div class="alert alert-success">
                                                                Mã giảm giá: <?php echo e($cou['coupon_code']); ?> được áp dụng thành
                                                                công.
                                                            </div>
                                                            <div class="order-col" style="margin-top:12px">
                                                                <div>
                                                                    <strong>Mã giảm giá: </strong>
                                                                </div>
                                                                <div>
                                                                    <?php
                                                                        $coupon_amount =
                                                                            $cou['coupon_type'] == 0
                                                                                ? $cou['coupon_amount']
                                                                                : ((Session::get('Cart')->totalPrice +
                                                                                        Session::get(
                                                                                            'shipping_fee.fee',
                                                                                        )) *
                                                                                        $cou['coupon_amount']) /
                                                                                    100;
                                                                    ?>
                                                                    <strong>-
                                                                        <?php echo e(number_format($coupon_amount, 0, ',', '.')); ?>

                                                                        đ</strong>
                                                                </div>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="alert alert-danger">Giá trị đơn hàng chưa đáp ứng,
                                                                tối thiểu là:
                                                                <span
                                                                    style="font-weight: 700;"><?php echo e(number_format($cou['min_order'], 0, ',', '.')); ?>

                                                                    đ</span>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <div class="alert alert-danger">Số lượng mã giảm giá
                                                            <?php echo e($cou['coupon_code']); ?> đã hết.</div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>

                                        <div class="order-col" style="margin-top:12px">
                                            <div>
                                                <strong>Tổng tiền: </strong>
                                            </div>
                                            <div id="total-price">
                                                <?php
                                                    if (Session::has('shipping_fee')) {
                                                        $shipping_fee = Session::has('shipping_fee.fee');
                                                        if (Session::has('Coupon')) {
                                                            $total_coupon =
                                                                Session::get('Cart')->totalPrice - $coupon_amount;
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
                                                            $total_coupon =
                                                                Session::get('Cart')->totalPrice - $coupon_amount;
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
                                    <div id="coupon-result" style="color: red;"></div>
                                    <div>
                                        <div>
                                            <div>
                                                <div>
                                                    <input type="radio" id="chuyen-khoan" name="payment_method"
                                                        value="0" checked>
                                                    <label for="chuyen-khoan">Chuyển khoản ngân hàng</label> (Cổng
                                                    VNPAY)<div></div>
                                                    <img style="height:32px; width:84px; border:1px solid #ccc; padding:5px; border-radius:3px;"
                                                        src="<?php echo e(asset('assets')); ?>/img/vnpay.webp">
                                                </div>
                                            </div>

                                            <div>
                                                <div>
                                                    <input type="radio" id="thanh-toan-khi-nhan-hang"
                                                        name="payment_method" value="1">
                                                    <label for="thanh-toan-khi-nhan-hang">Thanh toán khi nhận
                                                        hàng</label> (Trả tiền mặt)<div></div>
                                                    <img style="height:32px; width:84px; border:1px solid #ccc; padding:5px; border-radius:3px;"
                                                        src="<?php echo e(asset('assets')); ?>/img/tien-mat.jpg">
                                                </div>
                                            </div>

                                            <button class="primary-btn order-submit col-lg-offset-4"
                                                style="border-radius:6px;" type="submit" name="submit"
                                                id="orderButton">
                                                ĐẶT HÀNG
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\khoaluanchuyennganh\code\TLCN_Laravel\resources\views/checkout.blade.php ENDPATH**/ ?>