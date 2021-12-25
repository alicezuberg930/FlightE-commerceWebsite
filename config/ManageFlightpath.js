import { ListOfDestinations } from './DestinationList.js'
ListOfDestinations("", "#EndAirport")
ListOfDestinations("", "#StartAirport")
ListOfDestinations("", "#EndAirportTemp")
ListOfDestinations("", "#StartAirportTemp")
$("#StartAirport").change(() => {
    $("#EndAirport").html("")
    ListOfDestinations($("#StartAirport").val(), "#EndAirport")
})
$("#StartAirportTemp").change(() => {
    $("#EndAirportTemp").html("")
    ListOfDestinations($("#StartAirportTemp").val(), "#EndAirportTemp")
})
import { DisplayData, AddData, UpdateData, DeleteData } from "./CRUD.js"
let CurrentPage = 1;
DisplayData(CurrentPage, "../php/Flightpath/DisplayFlightpath.php");
$(document).on('click', '.card-footer span', function () {
    CurrentPage = $(this).text()
    DisplayData(CurrentPage, "../php/Flightpath/DisplayFlightpath.php")
})
$("#Add").click((e) => {
    e.preventDefault();
    $("#add-form input[type='number']").each(function () {
        if ($(this).val() < 0) {
            alert("Không được nhập số âm")
            return
        }
    })
    $.ajax({
        url: "../php/Flightpath/AddFlightpath.php",
        method: "post",
        data: $("#add-form").serialize(),
        success: function (a) {
            console.log(a)
            if (a == 1) {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    html: '<h3>Thêm thành công</h3>',
                })
                $("form")[0].reset();
                DisplayData(CurrentPage, "../php/Flightpath/DisplayFlightpath.php")
            } else {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'error',
                    html: '<h3>Đã tồn tại đường bay</h3>',
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
            DeleteData(CurrentPage, ID, "../php/Flightpath/DeleteFlightpath.php", "../php/Flightpath/DisplayFlightpath.php", "<h3>Đường bay đã có chuyến bay</h3>")
        }
    })
})
$(document).on('click', '#Edit', function () {
    let FlightpathID = $(this).parent().parent().find('td:nth-child(1)').text(),
        StartAirport = $(this).parent().parent().attr("data-startaid"),
        EndAirport = $(this).parent().parent().attr("data-endaid"),
        Time = $(this).parent().parent().find('td:nth-child(4)').text().split(" ")
    $("#FlightpathIDTemp").val(FlightpathID), $("#StartAirportTemp").val(StartAirport), $("#EndAirportTemp").val(EndAirport)
    $("#HourTemp").val(parseInt(Time[0])), $("#MinuteTemp").val(parseInt(Time[2]))
    $("#EditModal").modal("toggle")
})
$("#Confirm").click(() => {
    $("#edit-form input[type='number']").each(function () {
        if ($(this).val() < 0) {
            alert("Không được nhập số âm")
            return
        }
    })
    $.ajax({
        url: "../php/Flightpath/UpdateFlightpath.php",
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
                DisplayData(CurrentPage, "../php/Flightpath/DisplayFlightpath.php");
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
        DisplayData(CurrentPage, "../php/Flightpath/DisplayFlightpath.php")
    }
    $.ajax({
        url: "../php/Flightpath/SearchFlightpath.php",
        method: "post",
        data: { SearchString: $(this).val() },
        success: function (a) {
            let Obj = JSON.parse(a)
            $(".main-table tbody").html(Obj.CardBody)
        }
    })
})