<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn bạn đã đặt hàng</title>
</head>

<style>
    p {
        color: black;
    }
</style>

<body>
    <p>Xin chào <?php echo e($user->Last_name); ?>,</p>

    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Chúng tôi rất trân trọng sự ủng hộ của bạn.</p>

    <p>Dưới đây là một số thông tin về đơn hàng của bạn:</p>

    <table cellpadding="10" cellspacing="0" style="border: 1px solid #ccc; width: 100%;">
        <thead>
            <tr>
                <th style="border-bottom: 1px solid #ccc; text-align: left;">TÊN SẢN PHẨM</th>
                <th style="border-bottom: 1px solid #ccc; text-align: left;">LOẠI</th>
                <th style="border-bottom: 1px solid #ccc; text-align: left;">GIÁ</th>
                <th style="border-bottom: 1px solid #ccc; text-align: left;">SỐ LƯỢNG</th>
                <th style="border-bottom: 1px solid #ccc; text-align: left;">TỔNG</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($value->product_name); ?></td>
                <td><?php echo e($value->type_name); ?></td>
                <td><?php echo e(number_format($value->discount_price, 0, ',', '.')); ?> đ</td>
                <td>x <?php echo e($value->product_quantity); ?></td>
                <td><?php echo e(number_format($value->cost, 0, ',', '.')); ?> đ</td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>


    <p>Tổng tiền đơn hàng là: <?php echo e(number_format($order->total, 0, ',', '.')); ?></p>

    <p>Xin cảm ơn và chúc bạn một ngày tốt lành!</p>

    <p>Trân trọng,</p>
    <p>Đội ngũ cửa hàng Capple</p>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\TLCN_Laravel\resources\views/emails/order-success.blade.php ENDPATH**/ ?>