function AddCart(id) {
    $.ajax({
        url: "/add-cart/" + id,
        type: "GET",
    })
        .done(function (response) {
            RenderCart(response.view_1);
            RenderListCart(response.view_2);
            alertify.success("Đã thêm sản phẩm vào giỏ hàng");
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
        });
}
function AddQuantyCart(id) {
    $.ajax({
        url: "/add-quanty-cart/" + id + "/" + $("#quanty-item-" + id).val(),
        type: "GET",
    })
        .done(function (response) {
            RenderCart(response.view_1);
            alertify.success("Đã thêm sản phẩm vào giỏ hàng");
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
        });
}

$("#change-item-cart").on("click", ".delete i", function () {
    $.ajax({
        url: "/delete-item-cart/" + $(this).data("id"),
        type: "GET",
    })
        .done(function (response) {
            RenderCart(response);
            alertify.success("Đã xóa sản phẩm trong giỏ hàng");
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
        });
});

function DeleteListItemCart(id) {
    $.ajax({
        url: "/delete-list-item-cart/" + id,
        type: "GET",
    })
        .done(function (response) {
            RenderCart(response.view_1);
            RenderListCart(response.view_2);
            alertify.error("Đã xóa sản phẩm trong giỏ hàng");
            setTimeout(function () {
                location.reload();
            }, 300);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
        });
}

//
function SaveListItemCart(id) {
    $.ajax({
        url: "/save-list-item-cart/" + id + "/" + $("#quanty-item-" + id).val(),
        type: "GET",
    })
        .done(function (response) {
            RenderCart(response.view_1);
            RenderListCart(response.view_2);
            alertify.success("Đã cập nhật sản phẩm trong giỏ hàng");
            setTimeout(function () {
                location.reload();
            }, 300);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
        });
}
function RenderCart(response) {
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);

    $("#total-quanty-show").text($("#total-quanty-cart").val());
}
function RenderListCart(response) {
    $("#change-list-cart").empty();
    $("#change-list-cart").html(response);
    //$("#change-list-cart").replaceWith(response);
    $("#total-quanty-show").text($("#total-quanty-cart").val());
}

//
function addCoupon() {
    var couponResult = document.getElementById("coupon-result");
    if ($("#coupon-code").val() !== "") {
        // console.log($("#coupon-code").val());
        $.ajax({
            url: "/process-coupon/" + $("#coupon-code").val(),
            type: "GET",
        })
            .done(function (response) {
                //console.log(response);
                Rendercoupon(response);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
            });
    } else {
        couponResult.innerHTML =
            "Không được bỏ trống, vui lòng nhập mã giảm giá.";
        couponResult.style.cssText =
            "color: red; font-family: Montserrat; font-weight: 500; margin-top: 12px; margin-bottom: 24px;";
    }
}
function Rendercoupon(response) {
    $("#change-coupon").empty();
    $("#change-coupon").html(response);
}

//Sort
$(document).ready(function () {
    var active = location.search; //?kytu=asc
    $('#select-filter option[value="' + active + '"]').attr(
        "selected",
        "selected"
    );
});

$(".select-filter").change(function () {
    var value = $(this).find(":selected").val();

    //alert(value);
    if (value != 0) {
        var url = value;
        //alert(url);
        window.location.replace(url);
    } else {
        Swal.fire({
            title: "Cảnh báo!",
            text: "Hãy chọn 1 cách lọc sản phẩm!",
            icon: "warning",
        });
    }
});

//fee ship
function shippingFee() {
    var feeResult = document.getElementById("fee-result");
    var address = $("#address").val();

    if (address.trim() !== "") {
        $.ajax({
            url: "/shipping-fee/" + address,
            type: "GET",
        })
            .done(function (response) {
                renderFee(response.shipping_fee_view);
                renderTotalPrice(response.total_price_view);
            })

            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);

                $("#shipping_error").html(
                    "Địa chỉ bạn nhập chưa hợp lệ, vui lòng nhập lại!"
                );

                $("#shipping_error").css({
                    color: "red",
                    "font-family": "Montserrat",
                    "font-weight": "500",
                    "margin-top": "12px",
                    "margin-bottom": "24px",
                });
                $("#shipping_error").delay(1500).fadeOut("slow");
            });
    } else {
        $("#shipping_error").html("Vui lòng nhập đầy đủ địa chỉ nhận hàng!");
        $("#shipping_error").css({
            color: "red",
            "font-family": "Montserrat",
            "font-weight": "500",
            "margin-top": "12px",
            "margin-bottom": "24px",
        });
        $("#shipping_error").delay(1500).fadeOut("slow");
    }
}
function renderFee(response) {
    $("#fee-result").empty();
    $("#fee-result").html(response);
}
function renderTotalPrice(response) {
    $("#total-price").empty();
    $("#total-price").html(response);
}
function renderShippingErr(response) {
    $("#shipping_error").empty();
    $("#shipping_error").html(response);
}
