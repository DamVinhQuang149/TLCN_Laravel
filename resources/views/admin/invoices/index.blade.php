<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xuất Hóa Đơn</title>
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
        <h2>Mã đơn hàng: {{ $order->order_id }}</h2>
        <p><strong>Họ & tên khách hàng:</strong> {{ $order->First_name }} {{ $order->Last_name }}</p>
        <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
        <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
        <p><strong>Ngày đặt hàng:</strong> {{ $order->created_at->format('d/m/Y, H:i:s') }}</p>
        <p><strong>Hình thức thanh toán:</strong>
            @if ($order->checkout == 0)
                Chuyển khoản ngân hàng
            @else
                Thanh toán khi nhận hàng
            @endif
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
                @php
                    $totalCost = 0;
                @endphp
                @foreach ($order_details as $value)
                    <tr>
                        <td>{{ $value->product_name }}</td>
                        <td>{{ number_format($value->discount_price, 0, ',', '.') }}đ</td>
                        <td>x {{ $value->product_quantity }}</td>
                        <td>{{ number_format($value->cost, 0, ',', '.') }}đ</td>
                    </tr>
                    @php
                        $totalCost += $value->cost;
                    @endphp
                @endforeach

            </tbody>
        </table>
        <p><strong>Tạm tính: </strong>{{ number_format($totalCost, 0, ',', '.') }}đ</p>
        <p><strong>Phí vận chuyển: </strong>
            @if ($order->total >= 300000)
                0đ
            @else
                30.000đ
            @endif
        </p>
        <p><strong>Mã giảm giá: </strong>
            @if ($order->coupon_discount > 100)
                {{ number_format(-$order->coupon_discount, 0, ',', '.') }}
            @else
                {{ number_format(-(($order->coupon_discount * ($order->total / (1 - $order->coupon_discount / 100))) / 100), 0, ',', '.') }}đ
            @endif
        </p>
        <p><strong>Tổng tiền: </strong>{{ number_format($order->total, 0, ',', '.') }}đ</p>
    </div>
</body>

</html>
