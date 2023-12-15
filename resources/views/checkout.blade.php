@extends('layout.app')
@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <form id="orderForm" action="{{ route('order') }}" method="POST">
                @csrf
                @method('POST')
                <div>
                    <h2 class="title" style="border-radius:6px; margin-left:15px">Thanh toán</h2>
                </div>
                <div class="col-md-6">
                    <div class="billing-details" style="border-top: 1px solid #ccc">
                        <div class="section-title">
                            <h3 class="title" style="border-radius:6px;">Thông tin người nhận</h3>
                        </div>
                        <div class="form-group">
                            <h5>Họ & tên*</h5>
                            <input class="input" type="text" name="full_name" placeholder="Full Name"
                                value="{{ Auth::user()->First_name }} {{ Auth::user()->Last_name }}" readonly>
                        </div>
                        <h5>Địa chỉ nhận hàng mặc định* (Cập nhật tại trang cá nhân)</h5>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Địa chỉ nhận hàng" value="{{Auth::user()->address}}" required>
                        </div>
                        <h5>Số điện thoại*</h5>
                        <div class="form-group">
                            <input class="input" type="tel" name="phone" placeholder="Điện thoại"
                                value="0{{ Auth::user()->phone }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="order-notes">
                                <h5>Ghi chú</h5>
                                <textarea style="height: 115px; width: 555px" class="input"
                                    placeholder="Thông điệp bánh ngọt ví dụ: 'Chúc mừng sinh nhật'"
                                    name="note"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title" style="border-radius:6px;">Đơn hàng của bạn</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-products">
                                @if (Session::has("Cart") != null)
                                @foreach (Session::get('Cart')->products as $item)
                                <div class="order-col">
                                    <h5><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                                            src="{{ asset('assets/img/' . $item['productInfo']->pro_image) }}"> x {{
                                        $item['quanty'] }}
                                    </h5>
                                    <div style="width:60%">
                                        <strong>
                                            {{ $item['productInfo']->name }}
                                            <div></div>
                                            {{ number_format($item['price1'], 0, ',', '.') }} đ
                                        </strong>
                                    </div>
                                </div>
                                <div class="order-col">
                                    <div>
                                        <strong>Tạm tính:</strong>
                                    </div>
                                    <div>
                                        <strong class="order-cash-total">
                                            {{ number_format($item['price'], 0, ',', '.') }} đ
                                        </strong>
                                    </div>
                                </div>
                                <hr style="border-color: #ccc">
                                @endforeach
                                <div class="order-col">
                                    <div>
                                        <strong>Tiền hàng:</strong>
                                    </div>
                                    <div>
                                        <strong class="order-cash-total">
                                            @php
                                                
                                            @endphp
                                            {{ number_format(Session::get('Cart')->totalPrice, 0, ',', '.') }} đ
                                        </strong>
                                    </div>
                                </div>
                                @endif
                                <div class="order-col">
                                    <div>
                                        <strong>Phí ship:</strong>
                                    </div>
                                    @php
                                        $ship = 0;
                                        if(Session::get('Cart')->totalPrice < 300000){
                                            $ship = 30000;
                                        }

                                    @endphp
                                    <div>
                                        <strong class="order-cash-ship">
                                            {{ number_format($ship, 0, ',', '.') }} đ
                                        </strong>
                                    </div>
                                </div>

                                <div id="change-coupon">
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
                                                    @php
                                                        $coupon_amount = 0
                                                    @endphp
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
                                        @endif
                                    </div>
                                    <div class="order-col" style="margin-top:12px">
                                        <div>
                                            <strong>Tiền Tổng: </strong>
                                        </div>
                                        <div>
                                            @php
                                            if(Session::has("Coupon")){
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
                                </div>
                                <div id="coupon-result" style="color: red;"></div>
                                <div>
                                    <div>
                                        <div>
                                            <div>
                                                <input type="radio" id="chuyen-khoan" name="payment_method" value="0"
                                                    checked>
                                                <label for="chuyen-khoan">Chuyển khoản ngân hàng</label> (Cổng
                                                VNPAY)<div></div>
                                                <img style="height:32px; width:84px; border:1px solid #ccc; padding:5px; border-radius:3px;"
                                                    src="{{ asset('assets') }}/img/vnpay.webp">
                                            </div>
                                        </div>

                                        <div>
                                            <div>
                                                <input type="radio" id="thanh-toan-khi-nhan-hang" name="payment_method"
                                                    value="1">
                                                <label for="thanh-toan-khi-nhan-hang">Thanh toán khi nhận
                                                    hàng</label> (Trả tiền mặt)<div></div>
                                                <img style="height:32px; width:84px; border:1px solid #ccc; padding:5px; border-radius:3px;"
                                                    src="{{ asset('assets') }}/img/tien-mat.jpg">
                                            </div>
                                        </div>
                                        <button class="primary-btn order-submit col-lg-offset-4"
                                            style="border-radius:6px;" type="submit" name="submit">
                                            ĐẶT HÀNG</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection