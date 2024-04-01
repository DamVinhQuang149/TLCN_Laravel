function checkShippingFee() {
    if ("{{ Session::has('shipping_fee') }}") {
        document.getElementById("orderForm").submit();
    } else {
        alert("Vui lòng tính phí vận chuyển trước khi đặt hàng.");
    }
}
