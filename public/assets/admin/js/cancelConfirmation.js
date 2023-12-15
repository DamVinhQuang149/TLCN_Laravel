function confirmCancel(event) {
    event.preventDefault();
    Swal.fire({
        title: "Bạn có chắc muốn hủy đơn hàng này?",
        text: "Đơn sau khi hủy sẽ không thể khôi phục!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#80bb35",
        cancelButtonColor: "#FE9705",
        confirmButtonText: "Vâng, hủy đơn!"
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.closest('form').submit();
        }
    });
}