@if (Session::has('Coupon'))
    @foreach (Session::get('Coupon') as $key => $cou)
        @php
            $totalPrice = Session::get('Cart')->totalPrice;

            if ($totalPrice < 300000 && Session::has('shipping_fee')) {
                $totalPrice += Session::get('shipping_fee')['fee'];
            }

            $coupon_amount =
                $cou['coupon_type'] == 0 ? $cou['coupon_amount'] : ($totalPrice * $cou['coupon_amount']) / 100;

        @endphp
    @endforeach
@endif
@php
    $totalPrice = Session::get('Cart')->totalPrice;
    if (Session::has('shipping_fee')) {
        $shipping_fee = Session::has('shipping_fee.fee');

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
