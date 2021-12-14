$.ajax({
    url: "../php/Order/DisplayOrder.php",
    method: "get",
    success: function (data) {
        console.log(data)
        $(".table tbody").html(data)
    }
})
$(document).on("click", "#detail", function () {
    let OrderID = $(this).parent().parent().attr("data-id")
    $.ajax({
        url: "../php/Order/DisplayOrderDetail.php",
        method: "post",
        data: { OrderID: OrderID },
        success: function (data) {
            
        }
    })
})
