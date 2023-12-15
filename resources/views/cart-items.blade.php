@if (Session::has("Cart") != null)

<div class="cart-list">
    @foreach (Session::get('Cart')->products as $item)
    <div class="product-widget">
        <div class="product-img">
            <img class="si-pic" src="{{ asset('assets/img/' . $item['productInfo']->pro_image) }}" alt="">
        </div>
        <div class="product-body">
            <h3 class="product-name">
                <a
                    href="{{ route('detail.product', ['type_id' => $item['productInfo']->type_id, 'id' => $item['productInfo']->id]) }}">
                    {{ $item['productInfo']->name }}
                </a>
            </h3>
            <h4 class="product-price"><span class="qty">{{ $item['quanty'] }}</span><strong> x {{ number_format($item['price1']) }} VND</strong></h4>
        </div>
        <button class="delete">
            <i class="fa fa-close" data-id="{{ $item['productInfo']->id }}"></i>
        </button>

    </div>
    @endforeach
</div>
<div class="cart-summary">
    <small> {{ Session::get('Cart')->totalQuanty }} Sản phẩm </small>
    <h5><strong>TỔNG: {{ number_format(Session::get('Cart')->totalPrice) }} VND</strong></h5>
    <input hidden id="total-quanty-cart" type="number" value="{{ Session::get('Cart')->totalQuanty }}">
</div>
@endif