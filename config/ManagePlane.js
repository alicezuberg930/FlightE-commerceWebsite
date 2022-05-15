import { DisplayData, AddData, UpdateData, DeleteData } from "./CRUD.js"
let CurrentPage = 1;
DisplayData(CurrentPage, "../php/Plane/DisplayPlane.php");
$(document).on('click', '.card-footer span', function () {
    CurrentPage = $(this).text()
    DisplayData(CurrentPage, "../php/Plane/DisplayPlane.php")
})
let a = 1, b = 1
$("#Add").click((e) => {
    e.preventDefault();
    $("#add-form input[type='number']").each(function () {
        if ($(this).val() == '') {
            alert("Dữ liệu không được rỗng")
            a = 0
            return
        } else {
            a = 1
        }
        if ($(this).val() <= 0) {
            alert("Không được nhập số âm")
            a = 0
            return
        } else {
            a = 1
        }
    })
    if (a == 0) { return }
    $.ajax({
        url: "../php/Plane/AddPlane.php",
        method: "post",
        data: $("#add-form").serialize(),
        success: function (a) {
            if (a == 1) {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    html: '<h3>Thêm thành công</h3>',
                })
                $("form")[0].reset();
                DisplayData(CurrentPage, "../php/Plane/DisplayPlane.php")
            } else {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'warning',
                    html: '<h3>Trùng mã máy bay</h3>',
                })
            }
        }
    })
})
$(document).on('click', '#Delete', function () {
    let ID = $(this).parent().parent().find('td:nth-child(1)').text()
    Swal.fire({
        position: 'center',
        icon: 'warning',
        html: '<h3>Bạn có chắc chắn xóa không?</h3>',
        showCancelButton: true,
        cancelButtonText: "Thoát",
        confirmButtonText: "Đồng ý"
    }).then(re => {
        if (re.isConfirmed) {
            DeleteData(CurrentPage, ID, "../php/Plane/DeletePlane.php", "../php/Plane/DisplayPlane.php", "<h3>Máy bay đã được chỉ định chuyến bay</h3>")
        }
    })
})
$(document).on('click', '#Edit', function () {
    let PlaneID = $(this).parent().parent().find('td:nth-child(1)').text(),
        PlaneName = $(this).parent().parent().find('td:nth-child(2)').text(),
        Rows = $(this).parent().parent().find('td:nth-child(4)').text(),
        Columns = $(this).parent().parent().find('td:nth-child(5)').text(),
        BusinessRow = $(this).parent().parent().find('td:nth-child(6)').text()
    $("#PlaneIDTemp").val(PlaneID), $("#PlaneNameTemp").val(PlaneName), $("#RowsTemp").val(Rows), $("#ColumnsTemp").val(Columns)
    $("#BusinessRowTemp").val(BusinessRow), $("#HiddenPlaneID").val(PlaneID)
    $("#EditModal").modal("toggle")
})
$("#Confirm").click((e) => {
    e.preventDefault()
    $("#edit-form input[type='number']").each(function () {
        if ($(this).val() == '') {
            alert("Dữ liệu không được rỗng")
            b = 0
            return
        } else {
            b = 1
        }
        if ($(this).val() <= 0) {
            alert("Không được nhập số âm")
            b = 0
            return
        } else {
            b = 1
        }
    })
    if (b == 0) { return }
    $.ajax({
        url: "../php/Plane/UpdatePlane.php",
        method: "post",
        data: $("#edit-form").serialize(),
        success: function (a) {
            console.log(a)
            if (a == 1) {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    html: '<h3>Cập nhật thành công</h3>'
                })
                DisplayData(CurrentPage, "../php/Plane/DisplayPlane.php");
                $("#EditModal").modal("toggle")
            } else {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'error',
                    html: '<h3>Trùng mã máy bay</h3>'
                })
            }
        }
    })
})
$("#search").keyup(function () {
    if ($(this).val() == '') {
        DisplayData(CurrentPage, "../php/Plane/DisplayPlane.php")
    }
    $.ajax({
        url: "../php/Plane/SearchPlane.php",
        method: "post",
        data: { SearchString: $(this).val() },
        success: function (a) {
            console.log(a)
            let Obj = JSON.parse(a)
            $(".main-table tbody").html(Obj.CardBody)
        }
    })
})