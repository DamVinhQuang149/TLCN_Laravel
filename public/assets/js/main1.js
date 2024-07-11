function AddCart(id) {
    $.ajax({
        url: "/add-cart/" + id,
        type: "GET",
    })
        .done(function (response) {
            if (response.status === "success") {
                RenderCart(response.view_1);
                RenderListCart(response.view_2);
                RenderTotalQuanty(response.view_3);

                alertify.success("Thêm vào giỏ hàng thành công!");
            } else if (response.status === "error") {
                alertify.error(response.message);
            }
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
            if (response.status === "success") {
                RenderCart(response.view_1);
                RenderListCart(response.view_2);
                RenderTotalQuanty(response.view_3);
                alertify.success("Thêm vào giỏ hàng thành công!");
            } else if (response.status === "error") {
                alertify.error(response.message);
            }
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
            RenderCart(response.view_1);
            RenderTotalQuanty(response.view_2);

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
            RenderTotalQuanty(response.view_3);

            alertify.error("Đã xóa sản phẩm trong giỏ hàng");
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
        });
}

//
function SaveListItemCart(id) {
    var quantity = $("#quanty-item-" + id).val();

    if (quantity > 10) {
        alertify.error("Số lượng tối đa là 10 trên 1 sản phẩm / 1 đơn hàng");
        return;
    }

    $.ajax({
        url: "/save-list-item-cart/" + id + "/" + quantity,
        type: "GET",
    })
        .done(function (response) {
            if (response.status === "success") {
                RenderCart(response.view_1);
                RenderListCart(response.view_2);
                RenderTotalQuanty(response.view_3);

                alertify.success("Đã cập nhật sản phẩm trong giỏ hàng");
            } else if (response.status === "error") {
                alertify.error(response.message);
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
        });
}

function RenderCart(response) {
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);

    //$("#total-quanty-show").text($("#total-quanty-cart").val());
}
function RenderTotalQuanty(response) {
    $("#total-quanty-show").empty();
    $("#total-quanty-show").html(response);
}
function RenderListCart(response) {
    $("#change-list-cart").empty();
    $("#change-list-cart").html(response);
    //$("#change-list-cart").replaceWith(response);
    //$("#total-quanty-show").text($("#total-quanty-cart").val());
}

//Coupon
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
        // couponResult.innerHTML =
        //     "Không được bỏ trống, vui lòng nhập mã giảm giá.";
        // couponResult.style.cssText =
        //     "color: red; font-family: Montserrat; font-weight: 500; margin-top: 12px; margin-bottom: 24px;";
        // setTimeout(function () {
        //     couponResult.innerHTML = "";
        // }, 3000);
        alertify.error("Vui lòng nhập mã giảm giá!");
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
    var address = $("#address").val();

    if (address !== "") {
        // Kiểm tra xem địa chỉ không được để trống
        // Kiểm tra không cho nhập ký tự đặc biệt
        //if (/^[^\!@#$%^&*()_+={}\[\]:;"'<>,.?\\/]+$/.test(address)) {
            $.ajax({
                url: "/shipping-fee/" + address,
                type: "GET",
            }).done(function (response) {
                if (response.status === "success") {
                    renderFee(response.shipping_fee_view);
                    renderTotalPrice(response.total_price_view);
                    renderCouponAmount(response.coupon_amount_view);

                    alertify.success(
                        "Địa chỉ nhận hàng đã được nhập thành công."
                    );
                } else if (response.status === "error") {
                    alertify.error(response.message);
                }
            });
        // } else {
        //     alertify.error(
        //         "Vui lòng nhập địa chỉ nhận hàng không chứa ký tự đặc biệt!"
        //     );
        // }
    } else {
        alertify.error("Vui lòng nhập địa chỉ nhận hàng!");
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
function renderCouponAmount(response) {
    $("#coupon-amount-view").empty();
    $("#coupon-amount-view").html(response);
}
function renderShippingErr(response) {
    $("#shipping_error").empty();
    $("#shipping_error").html(response);
}

// comment
function writeComment() {
    // alert("Ok gửi");
    var messComment = document.getElementById("comment-result");
    var pro_id_comment = $(".product_id_comment").val();
    var comment = $(".comment").val();
    var star_rating = $(".star_rating_value").val();
    // alert(star_rating);
    if (comment !== "") {
        $.ajax({
            url:
                "/post-comment/" +
                pro_id_comment +
                "/" +
                comment +
                "/" +
                star_rating,
            type: "GET",
            success: function () {
                $(".comment").val("");
            },
        })
            .done(function (response) {
                if (response.status === "success") {
                    renderListComm(response.comment_view);
                    //alertify.success("Đánh giá sản phẩm thành công");
                    alertify.success(
                        "Bình luận của bạn đã được gửi đi và đang chờ được duyệt. Cảm ơn bạn đã góp ý!"
                    );
                } else if (response.status === "error") {
                    alertify.error(response.message);
                }
                //console.log(response.comment_view);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
            });
    } else {
        messComment.innerHTML = "Vui lòng nhập bình luận để đáng giá!";
        messComment.style.cssText =
            "color: red; font-family: Montserrat; font-weight: 500; margin-top: 12px; margin-bottom: 24px;";
    }
}

function deleteComment(id) {
    // alert("oke xóa");
    // alert(id);
    if (id) {
        $.ajax({
            url: "/delete-comment/" + id,
            type: "GET",
        })
            .done(function (response) {
                if (response.status === "success") {
                    renderListComm(response.comment_view);
                    //alertify.success("Đánh giá sản phẩm thành công");
                    alertify.success("Đã xóa bình luận");
                } else if (response.status === "error") {
                    alertify.error(response.message);
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
            });
    } else {
        alertify.error("Bình luận này không tồn tại");
        // setTimeout(function () {
        //     location.reload();
        // }, 300);
    }
}

function renderListComm(response) {
    $("#list-comment").empty();
    $("#list-comment").html(response);
}

// star
function ratingStar(star) {
    star.click(function () {
        var stars = $(".ratingW").find("li");
        stars.removeClass("on");
        var thisIndex = $(this).parents("li").index();
        for (var i = 0; i <= thisIndex; i++) {
            stars.eq(i).addClass("on");
        }
        putScoreNow(thisIndex + 1);
        $(".star_rating_value").val(i);
    });
}

function putScoreNow(i) {
    $(".scoreNow").html(i);
}

$(function () {
    if ($(".ratingW").length > 0) {
        ratingStar($(".ratingW li a"));
        $(".star_rating_value").val(3);
    }
});
