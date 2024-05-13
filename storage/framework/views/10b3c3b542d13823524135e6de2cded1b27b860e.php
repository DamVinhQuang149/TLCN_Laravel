<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo về số lượng tồn kho</title>
</head>

<body>
    <h2>Thông báo về số lượng tồn kho</h2>

    <p>Xin chào Admin,</p>

    <p>Chúng tôi gửi thông báo này để thông báo về tình trạng tồn kho của sản phẩm tại cửa hàng của bạn.</p>

    <table cellpadding="10" cellspacing="0" style="border: 1px solid #ccc; width: 100%;">
        <thead>
            <tr>
                <th style="border-bottom: 1px solid #ccc; text-align: left;">Mã Sản Phẩm</th>
                <th style="border-bottom: 1px solid #ccc; text-align: left;">Tên Sản Phẩm</th>
                <th style="border-bottom: 1px solid #ccc; text-align: left;">Số Lượng Tồn Kho</th>
                <th style="border-bottom: 1px solid #ccc; text-align: left;">Tình trạng</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td><?php echo e($inventory->product_id); ?></td>
                <td><?php echo e($inventory->product_name); ?></td>
                <td><?php echo e($inventory->remain_quantity); ?></td>
                <td><?php echo e($inventory->inventory_status); ?></td>
            </tr>
            

            <!-- Thêm các dòng khác cho các sản phẩm khác -->
        </tbody>
    </table>

    <p>Xin cảm ơn và chúc bạn một ngày tốt lành!</p>

    <p>Trân trọng,</p>
    <p>Đội ngũ cửa hàng Capple</p>
</body>

</html>
<?php /**PATH D:\khoaluanchuyennganh\code\codenew\TLCN_Laravel\resources\views/emails/inventory-quantity-notification.blade.php ENDPATH**/ ?>