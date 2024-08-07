<div class="order-col">

    @if (Session::has('Coupon') == null)
        <div style="width:50%">

            <strong>Nhập mã giảm giá:</strong>

        </div>

        <div style="width:30%">

            <input style="border: 2px dashed #000; border-radius: 4px; padding: 9px;" type="text" id="coupon-code"
                name="coupon-code" placeholder="Nhập mã giảm giá">

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
    @else
        <div style="width:50%">

            <strong></strong>

        </div>

        <div style="width:30%">

            <input hidden="border: 2px dashed #000; border-radius: 4px; padding: 9px;" type="text" id="coupon-code"
                name="coupon-code" placeholder="Nhập mã giảm giá">

        </div>

        <div style="width:20%">

            <a href="{{ route('unset.coupon') }}">

                <button type="button" id="applyCouponButton"
                    style="background-color: #FE9705; color: #fff; border: none; border-radius: 4px; padding: 9px; cursor: pointer;">

                    <strong>

                        Xóa mã

                    </strong>

                </button>

            </a>

        </div>
    @endif

</div>

<div>

    @if (Session::has('Coupon'))

        @foreach (Session::get('Coupon') as $key => $cou)
            @php

                $coupon_amount = 0;

            @endphp

            @if ($cou['coupon_remain'] > 0)
                @if ($cou['min_order'] < Session::get('Cart')->totalPrice)
                    <div class="alert alert-success">

                        Mã giảm giá: {{ $cou['coupon_code'] }} được áp dụng thành công.

                    </div>
                    <div id="coupon-amount-view">
                        <div class="order-col" style="margin-top:12px">

                            <div>

                                <strong>Mã giảm giá: </strong>

                            </div>
                            <div>

                                @php
                                    $totalPrice = Session::get('Cart')->totalPrice;

                                    if ($totalPrice < 300000 && Session::has('shipping_fee')) {
                                        $totalPrice += Session::get('shipping_fee')['fee'];
                                    }

                                    $coupon_amount =
                                        $cou['coupon_type'] == 0
                                            ? $cou['coupon_amount']
                                            : ($totalPrice * $cou['coupon_amount']) / 100;
                                @endphp
                                <strong>- {{ number_format($coupon_amount, 0, ',', '.') }} đ</strong>

                            </div>
                        </div>

                    </div>
                @else
                    <div class="alert alert-danger">Giá trị đơn hàng chưa đáp ứng, tối thiểu là:

                        <span style="font-weight: 700;">{{ number_format($cou['min_order'], 0, ',', '.') }} đ</span>

                    </div>
                @endif
            @else
                <div class="alert alert-danger">Số lượng mã giảm giá {{ $cou['coupon_code'] }} đã hết.</div>
            @endif
        @endforeach
    @else
        <div class="alert alert-danger">Mã giảm giá không hợp lệ hoặc đã hết hạn sử dụng.</div>

    @endif

</div>
<div class="order-col" style="margin-top:12px">

    <div>

        <strong>Tiền Tổng: </strong>

    </div>

    <div id="total-price">

        @php
            if (Session::has('shipping_fee')) {
                $shipping_fee = Session::has('shipping_fee.fee');
                $totalPrice = Session::get('Cart')->totalPrice;
                if (Session::has('Coupon')) {
                    $total_coupon = $totalPrice - $coupon_amount;
                } else {
                    $total_coupon = $totalPrice;
                }
                if ($totalPrice < 300000) {
                    $total_coupon += Session::get('shipping_fee.fee');
                }
            } else {
                if (Session::has('Coupon')) {
                    $total_coupon = $totalPrice - $coupon_amount;
                } else {
                    $total_coupon = $totalPrice;
                }
            }

            Session::put('total_coupon', $total_coupon);
        @endphp

        <h4 name=total>{{ number_format($total_coupon, 0, ',', '.') }} đ</h4>

        <input type="hidden" name="total" value="{{ $total_coupon }}">

    </div>

</div>
