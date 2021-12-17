import { DisplayData, AddData, UpdateData, DeleteData } from "./CRUD.js"
let CurrentPage = 1;
DisplayData(CurrentPage, "../php/Flight/DisplayFlight.php");
$(document).on('click', '.card-footer span', function () {
    CurrentPage = $(this).text()
    DisplayData(CurrentPage, "../php/Flight/DisplayFlight.php");
})
$("#Add").click((e) => {
    e.preventDefault();
    AddData(CurrentPage, {
        FlightTime: $("#Time").text(),
        StartDate: $("#StartDate").val(),
        StartTime: $("#StartTime").val(),
        PlaneDetails: $("#Airplane").val(),
        AirlineID: $("#Airline").val(),
        PathID: $("#Flightpath").val(),
        AdultPrice: $("#AdultPrice").val(),
        ChildrenPrice: $("#ChildrenPrice").val(),
        ToddlerPrice: $("#ToddlerPrice").val(),
        SeatAmount: $("#Airplane").val().split("-")[1]
    }, "../php/Flight/AddFlight.php", "../php/Flight/DisplayFlight.php")
    $.ajax({
        url: "../php/Ticket/AddTicket.php",
        method: "post",
        data: { PlaneDetails: $("#Airplane").val() },
        success: function (result) {
            alert(result)
        }
    })
})
$(document).on('click', '#Delete', function () {
    let StartDate = $(this).parent().parent().find('td:nth-child(3)').text().split("-")
    let StartTime = $(this).parent().parent().find('td:nth-child(4)').text().split(":")
    let FlightDate = new Date(StartDate[2] + "-" + StartDate[1] + "-" + StartDate[0] + "T" + StartTime[0] + ":" + StartTime[1] + ":" + StartTime[2])
    if (FlightDate > new Date()) {
        alert("Vẫn chưa qua ngày khởi hành")
        return
    }
    let ID = $(this).parent().parent().find('td:nth-child(2)').text()
    let c = confirm("Bạn có muốn xóa chuyến bay thứ " + ID + "?")
    if (c == true) {
        $.ajax({
            url: "../php/Ticket/DeleteTicket.php",
            method: "post",
            data: { ID: ID },
            success: function (result) {
                alert(result)
            }
        })
        DeleteData(CurrentPage, ID, "../php/Flight/DeleteFlight.php", "../php/Employee/DisplayFlight.php")
    }
})
$(document).on('click', '#Edit', function () {
    let ID = $(this).parent().parent().find('td:nth-child(2)').text(),
        StartDate = $(this).parent().parent().find('td:nth-child(3)').text(),
        StartTime = $(this).parent().parent().find('td:nth-child(4)').text(),
        Airline = $(this).parent().parent().find('td:nth-child(5)').text(),
        FlightPath = $(this).parent().parent().find('td:nth-child(6)').text(),
        AdultPrice = $(this).parent().parent().find('td:nth-child(7)').text(),
        ChildrenPrice = $(this).parent().parent().find('td:nth-child(8)').text(),
        ToddlerPrice = $(this).parent().parent().find('td:nth-child(9)').text()
    $("#myModal").modal("toggle")
})
$("#Confirm").click(() => {
    $.ajax({
        url: "../php/Staff/UpdateFlight.php",
        method: "post",
        data: {
            ID: ID,
            Fullname: $("#TempFullname").val(), Email: $("#TempEmail").val(), Password: $("#TempPassword").val(),
            Phonenumber: $("#TempPhonenumber").val(), Gender: $("#TempGender").val()
        },
        success: function (result) {
            ShowStaff(CurrentPage);
            if (result.success = true) {
                $("#myModal").modal("toggle")
                alert("Sửa thông tin nhân viên thành công")
            }
        }
    })
})
let DateObject = new Date(), DayofMonth = ''
if (DateObject.getDate() < 10) {
    DayofMonth = "0" + DateObject.getDate()
}
let CurrentDate = DateObject.getFullYear() + "-" + (DateObject.getMonth() + 1) + "-" + DayofMonth
$("#StartDate").attr('min', CurrentDate)
$("#StartDate").val(CurrentDate)
$.ajax({
    url: "../php/Flight/OtherInfo.php",
    method: 'get',
    success: function (data) {
        let Obj = JSON.parse(data)
        Obj.AirplaneArray.forEach((Airplane) => {
            $("#Airplane").append("<option value='" + Airplane.PlaneID + '-' + Airplane.Rows + "-" + Airplane.Columns + "-" + Airplane.BusinessClassRow + "'>"
                + Airplane.PlaneName + "</option>");
        });
        Obj.AirlineArray.forEach((Airline) => {
            $("#Airline").append("<option value='" + Airline.AirlineID + "'>" + Airline.AirlineName + "</option>");
        });
        Obj.FlightpathArray.forEach((Flightpath) => {
            $("#Flightpath").append("<option value='" + Flightpath.PathID + "'>" + Flightpath.CN1 + " ( " + Flightpath.AN1 + " ) -> "
                + Flightpath.CN2 + " ( " + Flightpath.AN2 + " )</option > ");
        });
    }
})