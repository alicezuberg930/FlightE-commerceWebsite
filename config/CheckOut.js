$.ajax({
    url: "../php/Order/GetPrice.php",
    method: "get",
    success: function (data) {
        let Obj = JSON.parse(data)
        $("#order_id").val(Obj.OrderID)
        $("#amount").val(Obj.TotalPrice)
    }
})
$.ajax({
    url: "../php/Order/SaveOrder.php",
    method: "get",
    success: function (data) {

    }
})