<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h2 {
            margin-top: 0;
        }
        .content {
            margin-top: 20px;
        }
        .footer {
            margin-top: 20px;
            font-size: 80%;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><?php echo e($advertisement->title); ?></h2>
        <div class="content">
            <p><strong>Content:</strong></p>
            <p><?php echo e($advertisement->content); ?></p>
            <p><strong>Offer:</strong> <?php echo e($advertisement->offer); ?></p>
            <p><strong>Contact Info:</strong> <?php echo e($advertisement->contact_info); ?></p>
            <p><strong>Đừng bỏ lỡ cơ hội này! Hãy truy cập vào <a href="<?php echo e(route('index')); ?>">WEBSITE</a> ngay để biết thông tin chi tiết về chương trình khuyến mãi</strong></p>
        </div>
        <div class="footer">
            <p>This email was sent to you because you subscribed to our advertising newsletter. If you wish to unsubscribe, please <a href="#">click here</a>.</p>
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/emails/advertisements.blade.php ENDPATH**/ ?>