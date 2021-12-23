import { DisplayData, AddData, UpdateData, DeleteData } from "./CRUD.js"
let CurrentPage = 1;
DisplayData(CurrentPage, "../php/Flight/DisplayFlight.php");
$(document).on('click', '.card-footer span', function () {
    CurrentPage = $(this).text()
    DisplayData(CurrentPage, "../php/Flight/DisplayFlight.php");
})
$("#Add").click((e) => {
    e.preventDefault();
    let Plane = $("#Airplane").val()
    AddData(CurrentPage, {
        FlightTime: $("#Time").text(),
        StartDate: $("#StartDate").val(),
        StartTime: $("#StartTime").val(),
        PlaneDetails: Plane,
        AirlineID: $("#Airline").val(),
        PathID: $("#Flightpath").val(),
        AdultPrice: $("#AdultPrice").val(),
        ChildrenPrice: $("#ChildrenPrice").val(),
        ToddlerPrice: $("#ToddlerPrice").val(),
        SeatAmount: $("#Airplane").val().split("-")[1]
    }, "../php/Flight/AddFlight.php", "../php/Flight/DisplayFlight.php")
    setTimeout(() => {
        $.ajax({
            url: "../php/Ticket/AddTicket.php",
            method: "post",
            data: { PlaneDetails: Plane },
            success: function (result) {
                alert(result)
            }
        })
    }, 2000)
})
$(document).on('click', '#Delete', function () {
    // let StartDate = $(this).parent().parent().find('td:nth-child(3)').text().split("-")
    // let StartTime = $(this).parent().parent().find('td:nth-child(4)').text().split(":")
    // let FlightDate = new Date(StartDate[2] + "-" + StartDate[1] + "-" + StartDate[0] + "T" + StartTime[0] + ":" + StartTime[1] + ":" + StartTime[2])
    // if (FlightDate > new Date()) {
    //     alert("Vẫn chưa qua ngày khởi hành")
    //     return
    // }
    let ID = $(this).parent().parent().find('td:nth-child(2)').text()
    let c = "<h3>Bạn có muốn xóa chuyến bay thứ " + ID + "?<h3>"
    Swal.fire({
        position: 'center',
        icon: 'warning',
        html: c,
        showCancelButton: true,
        cancelButtonText: "Thoát",
        confirmButtonText: "Đồng ý"
    }).then(re => {
        if (re.isConfirmed) {
            DeleteData(CurrentPage, ID, "../php/Flight/DeleteFlight.php", "../php/Employee/DisplayFlight.php", "<h3>Chuyến bay đã được đặt chỗ</h3>")
        }
    })
})
$(document).on('click', '#Edit', function () {
    let ID = $(this).parent().parent().find('td:nth-child(2)').text(),
        StartDate = $(this).parent().parent().find('td:nth-child(3)').text().split("-"),
        StartTime = $(this).parent().parent().find('td:nth-child(4)').text(),
        Airline = $(this).parent().parent().attr("data-airlineID"),
        FlightPath = $(this).parent().parent().find('td:nth-child(7)').text(),
        AdultPrice = $(this).parent().parent().find('td:nth-child(8)').text(),
        ChildrenPrice = $(this).parent().parent().find('td:nth-child(9)').text(),
        ToddlerPrice = $(this).parent().parent().find('td:nth-child(10)').text()
    $("#TempStartDate").val(StartDate[2] + "-" + StartDate[1] + "-" + StartDate[0]), $("#TempStartTime").val(StartTime), $("#TempAirline").val(Airline), $("#TempFlightpath").val(FlightPath)
    $("#TempAdultPrice").val(AdultPrice), $("#TempChilrenPrice").val(ChildrenPrice), $("#TempToddlerPrice").val(ToddlerPrice), $("#FlightID").val(ID)
    $("#EditModal").modal("toggle")
})
$("#Confirm").click(() => {
    $.ajax({
        url: "../php/Flight/UpdateFlight.php",
        method: "post",
        data: $("#edit-form").serialize(),
        success: function (a) {
            if (a == 1) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    html: '<h3>Cập nhật thành công</h3>'
                })
                DisplayData(CurrentPage, "../php/Flight/DisplayFlight.php");
                $("#EditModal").modal("toggle")
            }
        }
    })
})
let GetFormattedDate = (d) => {
    let DateObject = new Date(), DayofMonth = DateObject.getDate()
    if (DateObject.getDate() < 10) {
        DayofMonth = "0" + DateObject.getDate()
    }
    let CurrentDate = DateObject.getFullYear() + "-" + (DateObject.getMonth() + 1) + "-" + DayofMonth
    return CurrentDate
}
$("#StartDate").attr('min', GetFormattedDate())
$("#StartDate").val(GetFormattedDate())
$("#StartDateTemp").attr('min', GetFormattedDate())
let Options = (First, Second, Third) => {
    $.ajax({
        url: "../php/Flight/OtherInfo.php",
        method: 'get',
        success: function (data) {
            let Obj = JSON.parse(data)
            Obj.AirplaneArray.forEach((Airplane) => {
                $(First).append("<option value='" + Airplane.PlaneID + '-' + Airplane.Rows + "-" + Airplane.Columns + "-" + Airplane.BusinessClassRow + "'>"
                    + Airplane.PlaneName + "</option>");
            });
            Obj.AirlineArray.forEach((Airline) => {
                $(Second).append("<option value='" + Airline.AirlineID + "'>" + Airline.AirlineName + "</option>");
            });
            Obj.FlightpathArray.forEach((Flightpath) => {
                $(Third).append("<option value='" + Flightpath.PathID + "'>" + Flightpath.CN1 + " ( " + Flightpath.AN1 + " ) -> "
                    + Flightpath.CN2 + " ( " + Flightpath.AN2 + " )</option > ");
            });
        }
    })
}
Options("#Airplane", "#Airline", "#Flightpath")
Options('', "#TempAirline", "#TempFlightpath")
$(document).on("click", "#detail", function () {
    let ID = $(this).parent().parent().find('td:nth-child(2)').text()
    $.ajax({
        url: "../php/Flight/DisplayFlightDetail.php",
        method: "post",
        data: { FlightID: ID },
        success: function (a) {
            console.log(a)
            $(".detail-table tbody").html(a)
        }
    })
    $("#DetailModal").modal("toggle")
})