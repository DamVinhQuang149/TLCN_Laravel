<div id="fee-result">
    @if (Session::has('shipping_fee'))
        <div
            style="border: 2px solid #FE9705; border-radius:6px; padding:10px; padding-right:20px;
    padding-left:20px">
            <div class="order-col">
                <div class="order-col">
                    <strong>Giao đến </strong> <i class="fa fa-map-marker"></i>
                    :
                </div>
                <div class="order-col" style="width:80%">
                    <strong class="order-cash-ship">
                        <strong class="order-cash-ship">
                            <p>
                                {{ Session::get('shipping_fee.address') }}</p>
                        </strong>
                    </strong>
                </div>
            </div>
            <div class="order-col">
                <div class="order-col">
                    <strong>Khoảng cách </strong> <i class="fa fa-truck"></i> :
                </div>
                <div class="order-col">
                    <strong class="order-cash-ship">
                        <strong class="order-cash-ship">
                            <p>{{ Session::get('shipping_fee.distance') }} km
                            </p>
                        </strong>
                    </strong>
                </div>
            </div>
            <div class="order-col">
                <div class="order-col">
                    <strong>Thời gian ước tính</strong> <i class="fa fa-clock-o"></i> :
                </div>
                <div class="order-col">
                    <strong class="order-cash-ship">
                        <strong class="order-cash-ship">
                            <p>@php
                                $durationInMinutes = Session::get('shipping_fee.duration');
                                $hours = floor($durationInMinutes / 60);
                                $minutes = $durationInMinutes % 60;
                            @endphp

                            <p>
                                @if ($hours > 0)
                                    {{ $hours }} giờ
                                @endif
                                @if ($minutes > 0)
                                    {{ $minutes }} phút
                                @endif
                            </p>
                            </p>
                        </strong>
                    </strong>
                </div>
            </div>
            <div class="order-col" style="margin-top:6px">
                <div class="order-col">
                    <strong>Phí vận chuyển</strong> <i class="fa fa-money"></i>
                    :
                </div>
                <div class="order-col" style="width:60%">
                    <strong class="order-cash-ship">
                        @if (Session::get('Cart')->totalPrice >= 300000)
                            <p>Miễn phí khi tiền hàng từ 300.000đ
                            </p>
                        @else
                            <p>{{ number_format(Session::get('shipping_fee.fee'), 0, ',', '.') }}
                                đ</p>
                        @endif
                    </strong>
                </div>
            </div>
        </div>
    @endif
</div>
