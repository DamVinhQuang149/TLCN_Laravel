function AddCart(id) {
    $.ajax({
        url: '/add-cart/' + id,
        type: 'GET',
    }).done(function(response) {
        RenderCart(response.view_1);
        RenderListCart(response.view_2)
        alertify.success('Đã thêm sản phẩm vào giỏ hàng');
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error:", textStatus, errorThrown);
    });
}
function AddQuantyCart(id) {
    $.ajax({
        url: '/add-quanty-cart/' + id +'/'+ $("#quanty-item-"+id).val(),
        type: 'GET',
    }).done(function(response) {
        RenderCart(response.view_1);
        alertify.success('Đã thêm sản phẩm vào giỏ hàng');
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error:", textStatus, errorThrown);
    });
}

$("#change-item-cart").on('click', ".delete i", function(){
    $.ajax({
        url: '/delete-item-cart/' + $(this).data("id"),
        type: 'GET',
    }).done(function(response) {
        RenderCart(response);
        alertify.success('Đã xóa sản phẩm trong giỏ hàng');
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error:", textStatus, errorThrown);
    });
});

function RenderCart(response){
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);
    $("#total-quanty-show").text($("#total-quanty-cart").val());
}

function DeleteListItemCart(id){
    $.ajax({
        url: '/delete-list-item-cart/' + id,
        type: 'GET',
    }).done(function(response) {
        RenderListCart(response);
        alertify.success('Đã xóa sản phẩm trong giỏ hàng');
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error:", textStatus, errorThrown);
    });
}

//
function SaveListItemCart(id){
    $.ajax({
        url: '/save-list-item-cart/' + id +'/'+$("#quanty-item-"+id).val(),
        type: 'GET',
    }).done(function(response) {
        RenderListCart(response);
        alertify.success('Đã cập nhật sản phẩm trong giỏ hàng');
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error:", textStatus, errorThrown);
    });
}
function RenderListCart(response){
    $("#list-cart").empty();
    $("#list-cart").html(response);
}
//
function addCoupon(){
    var couponResult = document.getElementById("coupon-result");
    if($("#coupon-code").val() !== ''){
        // console.log($("#coupon-code").val());
        $.ajax({
            url: '/process-coupon/'+$("#coupon-code").val(),
            type: 'GET',
        }).done(function(response) {
            
            //console.log(response);
            RenderListCart(response);
            
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
        });
    }
    else {
        couponResult.innerHTML = 'Không được bỏ trống, vui lòng nhập mã giảm giá.';
        couponResult.style.cssText = 'color: red; font-family: Montserrat; font-weight: 500; margin-top:12px;margin-bottom:24px;';
    }
    
}
function RenderListCart(response){
    $("#change-coupon").empty();
    $("#change-coupon").html(response);
}

//Sort
$(document).ready(function() {
    var active = location.search; //?kytu=asc
    $('#select-filter option[value="' + active + '"]').attr('selected', 'selected');
})

$('.select-filter').change(function() {

    var value = $(this).find(':selected').val();

    //alert(value);
    if (value != 0) {
        var url = value;
        //alert(url);
        window.location.replace(url);
    } else {
        alert('Hãy lọc sản phẩm');
    }

})