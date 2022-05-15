import { DisplayData, AddData, UpdateData, DeleteData } from "./CRUD.js"
let CurrentPage = 1;
DisplayData(CurrentPage, "../php/Airline/DisplayAirline.php");
$(document).on('click', '.card-footer span', function () {
    CurrentPage = $(this).text()
    DisplayData(CurrentPage, "../php/Airline/DisplayAirline.php")
})
$("#Add").click((e) => {
    e.preventDefault();
    if ($("#CountryID").val() == '') {
        Swal.fire({
            position: 'bottom-end',
            icon: 'warning',
            html: '<h3>Hãy chọn 1 quốc gia</h3>'
        })
        return
    }
    let image = $("#AirlineImage").prop("files")[0]
    let form = new FormData()
    form.append("AirlineImage", image);
    $.ajax({
        url: "../php/Airline/UploadFile.php",
        method: "post",
        data: form,
        contentType: false,
        processData: false,
        success: function (a) {
            $.ajax({
                url: "../php/Airline/AddAirline.php",
                method: "post",
                data: a + "&" + $("#add-form").serialize(),
                success: function (data) {
                    if (data == 1) {
                        Swal.fire({
                            position: 'bottom-end',
                            icon: 'success',
                            html: '<h3>Thêm thành công</h3>'
                        })
                        $("form")[0].reset();
                        DisplayData(CurrentPage, "../php/Airline/DisplayAirline.php")
                    } else {
                        Swal.fire({
                            position: 'bottom-end',
                            icon: 'warning',
                            html: '<h3>Trùng mã hãng hàng không</h3>'
                        })
                    }
                }
            })
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
            DeleteData(CurrentPage, ID, "../php/Airline/DeleteAirline.php", "../php/Airline/DisplayAirline.php", "<h3>Hãng hàng không đã lập chuyến bay</h3>")
            DisplayData(CurrentPage, "../php/Airline/DisplayAirline.php")
        }
    })
})
$(document).on('click', '#Edit', function () {
    let AirlineID = $(this).parent().parent().find('td:nth-child(1)').text(),
        AirlineName = $(this).parent().parent().find('td:nth-child(2)').text(),
        CountryID = $(this).parent().parent().attr("data-countryid")
    $("#AirlineIDTemp").val(AirlineID), $("#AirlineNameTemp").val(AirlineName), $("#CountryIDTemp").val(CountryID), $("#HiddenAirlineID").val(AirlineID)
    $("#EditModal").modal("toggle")
})
$("#Confirm").click((e) => {
    e.preventDefault()
    if ($("#CountryIDTemp").val() == '') {
        alert("Hãy chọn 1 quốc gia")
        return
    }
    let image = $("#AirlineImageTemp").prop("files")[0]
    let form = new FormData()
    form.append("AirlineImage", image);
    $.ajax({
        url: "../php/Airline/UploadFile.php",
        method: "post",
        data: form,
        contentType: false,
        processData: false,
        success: function (a) {
            $.ajax({
                url: "../php/Airline/UpdateAirline.php",
                method: "post",
                data: a + "&" + $("#edit-form").serialize(),
                success: function (a) {
                    console.log(a)
                    if (a == 1) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            html: '<h3>Cập nhật thành công</h3>'
                        })
                        DisplayData(CurrentPage, "../php/Airline/DisplayAirline.php");
                        $("#EditModal").modal("toggle")
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            html: '<h3>Trùng mã máy bay</h3>'
                        })
                    }
                }
            })
        }
    })
})
$.ajax({
    url: "../php/Airline/CountryList.php",
    method: "get",
    success: function (a) {
        $("#CountryID").append(a)
        $("#CountryIDTemp").append(a)
    }
})
$("#search").keyup(function () {
    if ($(this).val() == '') {
        DisplayData(CurrentPage, "../php/Airline/DisplayAirline.php")
    }
    $.ajax({
        url: "../php/Airline/SearchAirline.php",
        method: "post",
        data: { SearchString: $(this).val() },
        success: function (a) {
            console.log(a)
            let Obj = JSON.parse(a)
            $(".main-table tbody").html(Obj.CardBody)
        }
    })
})