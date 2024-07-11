@if (Session::has('Coupon'))
    @foreach (Session::get('Coupon') as $key => $cou)
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
                        $cou['coupon_type'] == 0 ? $cou['coupon_amount'] : ($totalPrice * $cou['coupon_amount']) / 100;
                @endphp



                <strong>-
                    {{ number_format($coupon_amount, 0, ',', '.') }}
                    đ</strong>
            </div>
        </div>
    @endforeach
@endif
