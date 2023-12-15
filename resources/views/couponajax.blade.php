<div class="order-col">
    @if (Session::has("Coupon") == null)
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
                <!-- Thay 'ten_route' bằng tên route hoặc URL bạn muốn liên kết đến -->
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
    @if (Session::has("Coupon"))
        @foreach (Session::get('Coupon') as $key => $cou)
                @php
                    $coupon_amount = 0
                @endphp
            @if ($cou['coupon_remain'] > 0)
                @if ($cou['min_order'] < Session::get('Cart')->totalPrice)
                    <div class="alert alert-success">
                        Mã giảm giá: {{ $cou['coupon_code'] }} được áp dụng thành công.
                    </div>
                    <div class="order-col" style="margin-top:12px">
                        <div>
                            <strong>Mã giảm giá: </strong>
                        </div>
                        <div>
                            @php
                            $coupon_amount = ($cou['coupon_type'] == 0) ?
                            ($cou['coupon_amount']) : ((Session::get('Cart')->totalPrice * $cou['coupon_amount']) / 100);
                            @endphp
                            <h4>- {{ number_format($coupon_amount, 0, ',', '.') }} đ</h4>
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
    <div>
        @php
        $ship = 0;
        if(Session::get('Cart')->totalPrice < 300000){
            $ship = 30000;
        }
        if(Session::has("Coupon") ){
            $total_coupon = (Session::get('Cart')->totalPrice - $coupon_amount) + $ship;
        }else{
            $total_coupon = Session::get('Cart')->totalPrice + $ship;
        }

        Session::put('total_coupon', $total_coupon);
        @endphp
        <h4 name=total>{{ number_format($total_coupon, 0, ',', '.') }} đ</h4>
        <input type="hidden" name="total"  value="{{ $total_coupon }}">
    </div>
</div>