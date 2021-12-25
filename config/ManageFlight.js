import { DisplayData, AddData, UpdateData, DeleteData } from "./CRUD.js"
let CurrentPage = 1;
DisplayData(CurrentPage, "../php/Flight/DisplayFlight.php");
$(document).on('click', '.card-footer span', function () {
    CurrentPage = $(this).text()
    DisplayData(CurrentPage, "../php/Flight/DisplayFlight.php");
})
$("#Add").click((e) => {
    e.preventDefault();
    $("#add-form input[type='number']").each(function () {
        if ($(this).val() <= 0) {
            alert("Không được nhập số âm")
            return 0
        }
    })
    $.ajax({
        url: "../php/Flight/AddFlight.php",
        method: "post",
        data: $("#add-form").serialize(),
        success: function (data) {
            Swal.fire({
                position: 'bottom-end',
                icon: 'success',
                html: data,
                showCancelButton: false,
            })
            DisplayData(CurrentPage, "../php/Flight/DisplayFlight.php");
        }
    })
})
$(document).on('click', '#Delete', function () {
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
            DeleteData(CurrentPage, ID, "../php/Flight/DeleteFlight.php", "Chuyến bay đã được đặt chỗ")
            DisplayData(CurrentPage, "../php/Flight/DisplayFlight.php");
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
    $("#TempAdultPrice").val(FilterPrice(AdultPrice)), $("#TempChilrenPrice").val(FilterPrice(ChildrenPrice))
    $("#TempToddlerPrice").val(FilterPrice(ToddlerPrice)), $("#FlightID").val(ID)
    $("#EditModal").modal("toggle")
})
let FilterPrice = (Number) => {
    return parseInt(Number.replace(" ", '').replace("VND", '').replace(',', '').replace(',', ''))
}
$("#Confirm").click((e) => {
    e.preventDefault()
    $("#edit-form input[type='number']").each(function () {
        if ($(this).val() <= 0) {
            alert("Không được nhập số âm")
            return
        }
    })
    $.ajax({
        url: "../php/Flight/UpdateFlight.php",
        method: "post",
        data: $("#edit-form").serialize(),
        success: function (a) { console.log(a)
            if (a == 1) {
                Swal.fire({
                    position: 'bottom-end',
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
$("#search").keyup(function () {
    if ($(this).val() == '') {
        DisplayData(CurrentPage, "../php/Flight/DisplayFlight.php");
    }
    $.ajax({
        url: "../php/Flight/SearchFlight.php",
        method: "post",
        data: { SearchString: $(this).val() },
        success: function (data) {
            console.log(data)
            let Obj = JSON.parse(data)
            $(".main-table tbody").html(Obj.CardBody)
        }
    })
})