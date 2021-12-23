let DisplayOrder = () => {
    $.ajax({
        url: "../php/Order/DisplayOrder.php",
        method: "get",
        success: function (data) {
            $("#orders tbody").html(data)
        }
    })
}
DisplayOrder()
let GetDetails = (OrderID) => {
    $.ajax({
        url: "../php/Order/DisplayOrderDetail.php",
        method: "post",
        data: { OrderID: OrderID },
        success: function (data) {
            $("#myModal table tbody").html(data)
        }
    })
}
$(document).on("click", "#detail", function () {
    let OrderID = $(this).parent().parent().attr("data-id")
    GetDetails(OrderID)
    $("#myModal").modal("toggle")
})
$(document).on("click", "#cancel", function () {
    let OrderDate = $(this).parent().parent().children().eq(1).text().split("-")
    if ((new Date().getTime() - new Date(OrderDate[2] + "-" + OrderDate[1] + "-" + OrderDate[0]).getTime()) / (1000 * 60 * 60) >= 24) {
        Swal.fire({
            position: 'center',
            icon: 'error',
            html: "<h4>Đã quá 24h</h4>",
        })
        return
    }
    let StartDate = $(this).parent().parent().children().eq(6).text().split("-")
    if (new Date(StartDate[2] + "-" + StartDate[1] + "-" + StartDate[0]) < new Date()) {
        Swal.fire({
            position: 'center',
            icon: 'error',
            html: "<h4>Đã qua ngày khởi hành</h4>",
        })
        return
    }
    let OrderID = $(this).parent().parent().attr("data-id")
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: "Cảnh báo",
        html: "<h4>Bạn có muốn hủy hóa đơn này không?</h4>",
        showCancelButton: true,
        cancelButtonText: "Hủy",
        confirmButtonText: "Đồng ý"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../php/Order/CancelOrder.php",
                method: "post",
                data: { OrderID: OrderID },
                success: function (data) {
                    console.log(data)
                    if (data != '') {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            html: "<h4>Đơn hàng đã được hủy thành công</h4>",
                            showCancelButton: true
                        })
                        DisplayOrder()
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            html: "<h4>Đã quá 24h hoặc chuyến bay đã khởi hành</h4>",
                            showCancelButton: true
                        })
                    }
                }
            })
        }
    })
})
export { GetDetails }
import { ExportOrder, ExportOrderDetail } from "./EmployeeOrder.js"
ExportOrder()
ExportOrderDetail()