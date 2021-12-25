import { DisplayData, AddData, UpdateData, DeleteData } from "./CRUD.js"
let CurrentPage = 1;
DisplayData(CurrentPage, "../php/Airport/DisplayAirport.php");
$(document).on('click', '.card-footer span', function () {
    CurrentPage = $(this).text()
    DisplayData(CurrentPage, "../php/Airport/DisplayAirport.php")
})
$("#Add").click((e) => {
    e.preventDefault();
    if ($("#Length").val() <= 0) {
        alert("Độ dài không hợp lệ")
        return
    }
    if ($("#CityID").val() == '') {
        alert("Vui lòng chọn 1 thành phố")
        return
    }
    $.ajax({
        url: "../php/Airport/AddAirport.php",
        method: "post",
        data: $("#add-form").serialize(),
        success: function (a) {
            console.log(a)
            if (a == 1) {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    html: '<h3>Thêm thành công</h3>'
                })
                $("form")[0].reset();
                DisplayData(CurrentPage, "../php/Airport/DisplayAirport.php")
            } else {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'warning',
                    html: '<h3>Trùng mã sân bay</h3>'
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
            DeleteData(CurrentPage, ID, "../php/Airport/DeleteAirport.php", "../php/Airport/DisplayAirport.php", "<h3>Sân bay đang thuộc 1 (hay nhiều) đường bay</h3>")
            DisplayData(CurrentPage, "../php/Airport/DisplayAirport.php")
        }
    })
})
$(document).on('click', '#Edit', function () {
    let AirportID = $(this).parent().parent().find('td:nth-child(1)').text(),
        AirportName = $(this).parent().parent().find('td:nth-child(2)').text(),
        Length = $(this).parent().parent().find('td:nth-child(4)').text(),
        CityID = $(this).parent().parent().attr("data-cityid")
    $("#LengthTemp").val(parseFloat(Length.replace(' km', ''))), $("#AirportNameTemp").val(AirportName), $("#CityIDTemp").val(CityID), $("#HiddenAirportID").val(AirportID)
    $("#AirportIDTemp").val(AirportID)
    $("#EditModal").modal("toggle")
})
$("#Confirm").click((e) => {
    e.preventDefault()
    if ($("#LengthTemp").val() <= 0) {
        alert("Độ dài không hợp lệ")
        return
    }
    if ($("#CityIDTemp").val() == '') {
        alert("Vui lòng chọn 1 thành phố")
        return
    }
    $.ajax({
        url: "../php/Airport/UpdateAirport.php",
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
                DisplayData(CurrentPage, "../php/Airport/DisplayAirport.php");
                $("#EditModal").modal("toggle")
            } else {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'error',
                    html: '<h3>Trùng mã sân bay</h3>'
                })
            }
        }
    })
})
$.ajax({
    url: "../php/Airport/CityList.php",
    method: "get",
    success: function (a) {
        $("#CityID").append(a)
        $("#CityIDTemp").append(a)
    }
})
$("#search").keyup(function () {
    if ($(this).val() == '') {
        DisplayData(CurrentPage, "../php/Airport/DisplayAirport.php")
    }
    $.ajax({
        url: "../php/Airport/SearchAirport.php",
        method: "post",
        data: { SearchString: $(this).val() },
        success: function (a) {
            $(".main-table tbody").html(a)
        }
    })
})