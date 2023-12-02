function AddCart(id) {
    $.ajax({
        url: '/add-cart/' + id,
        type: 'GET',
    }).done(function(response) {
        RenderCart(response);
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