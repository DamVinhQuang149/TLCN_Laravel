<div id="fee-result">
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
                        <strong>Thời gian ước tính</strong> <i class="fa fa-clock-o"></i> :
                    </div>
                    <div class="order-col">
                        <strong class="order-cash-ship">
                            <strong class="order-cash-ship">
                                <p><?php
                                    $durationInMinutes = Session::get('shipping_fee.duration');
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
        <?php else: ?>
            <div class="alert alert-danger" id="shipping_policy">Xin lỗi về sự bất tiện này, hiện chúng tôi chỉ
                giao vận trong phạm vi bán kính từ 2km - 25km!</div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH D:\khoaluanchuyennganh\code\02_04_2024\TLCN_Laravel\resources\views/ajax/ajax_shipping_fee.blade.php ENDPATH**/ ?>