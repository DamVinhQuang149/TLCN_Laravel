<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Hóa Đơn</title>
    <style>
        body {
            font-family: 'DejaVu Sans';
        }

        .invoice {
            max-width: 600px;
            margin: auto;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="invoice">
        <h1 style="color:black">Hóa đơn đặt hàng</h1>
        <h2>Mã đơn hàng: <?php echo e($order->order_id); ?></h2>
        <p><strong>Họ & tên khách hàng:</strong> <?php echo e($order->First_name); ?> <?php echo e($order->Last_name); ?></p>
        <p><strong>Địa chỉ:</strong> <?php echo e($order->address); ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo e($order->phone); ?></p>
        <p><strong>Ngày đặt hàng:</strong> <?php echo e($order->created_at->format('d/m/Y, H:i:s')); ?></p>
        <p><strong>Hình thức thanh toán:</strong>
            <?php if($order->checkout == 0): ?>
                Chuyển khoản ngân hàng
            <?php else: ?>
                Thanh toán khi nhận hàng
            <?php endif; ?>
        </p>
        <table cellspacing="0" class="shop_table cart">
            <thead>
                <tr>
                    <th style="width: 45%">SẢN PHẨM</th>
                    <th style="width: 26%">GIÁ</th>
                    <th style="width: 25%">SỐ LƯỢNG</th>
                    <th style="width: 26%">TỔNG GIÁ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $totalCost = 0;
                ?>
                <?php $__currentLoopData = $order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($value->product_name); ?></td>
                        <td><?php echo e(number_format($value->discount_price, 0, ',', '.')); ?>đ</td>
                        <td>x <?php echo e($value->product_quantity); ?></td>
                        <td><?php echo e(number_format($value->cost, 0, ',', '.')); ?>đ</td>
                    </tr>
                    <?php
                        $totalCost += $value->cost;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
        <p><strong>Tạm tính: </strong><?php echo e(number_format($totalCost, 0, ',', '.')); ?>đ</p>
        <p><strong>Phí vận chuyển: </strong>
            <?php if($order->total >= 300000): ?>
                0đ
            <?php else: ?>
                30.000đ
            <?php endif; ?>
        </p>
        <p><strong>Mã giảm giá: </strong>
            <?php if($order->coupon_discount > 100): ?>
                <?php echo e(number_format(-$order->coupon_discount, 0, ',', '.')); ?>

            <?php else: ?>
                <?php echo e(number_format(-(($order->coupon_discount * ($order->total / (1 - $order->coupon_discount / 100))) / 100), 0, ',', '.')); ?>đ
            <?php endif; ?>
        </p>
        <p><strong>Tổng tiền: </strong><?php echo e(number_format($order->total, 0, ',', '.')); ?>đ</p>
    </div>
</body>

</html>
<?php /**PATH C:\Users\duyho\Desktop\Nhóm 4 - Xây dựng website bán thức ăn trực tuyến\TLCN_Laravel\resources\views/invoices/index.blade.php ENDPATH**/ ?>