<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo có đơn hàng mới</title>
</head>

<style>
    p {
        color: black;
    }
</style>

<body>
    <p>Xin chào Admin,</p>

    <p>Có một đơn hàng mới đã được đặt tại cửa hàng. Hãy kiểm tra và xử lý nó ngay khi có thể.</p>

    <p>Dưới đây là một số thông tin về đơn hàng:</p>

    <p>Đơn hàng của {{ $user->First_name }} {{ $user->Last_name }}</p>
    <p>Mã đơn hàng: {{ $order->order_code }}</p>
    <p>Chi tiết đơn hàng</p>
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
            @foreach ($orderdetails as $value)
                <tr>
                    <td>{{ $value->product_name }}</td>
                    <td>{{ $value->type_name }}</td>
                    <td>{{ number_format($value->discount_price, 0, ',', '.') }} đ</td>
                    <td>x {{ $value->product_quantity }}</td>
                    <td>{{ number_format($value->cost, 0, ',', '.') }} đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($order->coupon_discount > 100)
        <p> Đã giảm giá: {{ number_format(-$order->coupon_discount, 0, ',', '.') }}đ </p>
    @else
        <p> Đã giảm giá:
            {{ number_format(-(($order->coupon_discount * ($order->total / (1 - $order->coupon_discount / 100))) / 100), 0, ',', '.') }}đ
        </p>
    @endif
    <p>Tổng tiền đơn hàng là: {{ number_format($order->total, 0, ',', '.') }}</p>

    <p>Xin cảm ơn và chúc bạn một ngày tốt lành!</p>

    <p>Trân trọng,</p>
    <p>Đội ngũ cửa hàng Capple</p>
</body>

</html>
