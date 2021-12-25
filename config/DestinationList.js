function ListOfDestinations(ID, Element) {
    $.ajax({
        url: "../php/SearchList/DestinationList.php",
        method: 'post',
        data: {
            Airport: ID
        },
        success: function (data) {
            let Obj = JSON.parse(data)
            Obj.CountryArray.forEach((Country) => {
                $(Element).append("<optgroup label='" + Country.CountryName + "'>");
                Obj.CityAirportArray.forEach((CityAirport) => {
                    if (Country.CountryID == CityAirport.CountryID) {
                        $(Element).append("<option value='" + CityAirport.AirportID + "'>" + CityAirport.CityName + " (" + CityAirport.AirportID + ")</option>");
                    }
                });
                $(Element).append("</optgroup>");
            });
            $(Element).append("<option selected disabled hidden>Chọn thành phố (Sân bay)</option>");
        }
    })
}
ListOfDestinations("", "#EndAirport")
ListOfDestinations("", "#StartAirport")
$("#StartAirport").change(() => {
    $("#EndAirport").html("")
    ListOfDestinations($("#StartAirport").val(), "#EndAirport")
})
let adultNumber = parseInt($(".adult span").text())
$(".adult .fa-minus").click(() => {
    if (adultNumber == 1) {
        return 0;
    }
    adultNumber = adultNumber - 1
    $(".adult span").text(adultNumber.toString())
})
$(".adult .fa-plus").click(() => {
    if (adultNumber + childrenNumber + toddlerNumber == 9) {
        return 0
    }
    adultNumber = adultNumber + 1
    $(".adult span").text(adultNumber.toString())
})

let childrenNumber = parseInt($(".children span").text())
$(".children .fa-minus").click(() => {
    if (childrenNumber == 0) {
        return 0;
    }
    childrenNumber = childrenNumber - 1
    $(".children span").text(childrenNumber.toString())
})
$(".children .fa-plus").click(() => {
    if (adultNumber + childrenNumber + toddlerNumber == 9) {
        return 0
    }
    childrenNumber = childrenNumber + 1
    $(".children span").text(childrenNumber.toString())
})

let toddlerNumber = parseInt($(".toddler span").text())
$(".toddler .fa-minus").click(() => {
    if (toddlerNumber == 0) {
        return 0;
    }
    toddlerNumber = toddlerNumber - 1
    $(".toddler span").text(toddlerNumber.toString())

})
$(".toddler .fa-plus").click(() => {
    if (adultNumber + childrenNumber + toddlerNumber == 9) {
        return 0
    }
    toddlerNumber = toddlerNumber + 1
    $(".toddler span").text(toddlerNumber.toString())
})

$("#one-way").click(() => {
    if ($("#one-way").prop('checked') == true) {
        $("#EndDate").prop('disabled', true)
        $("#round-trip").prop('checked', false)
    } else {
        $("#one-way").prop('checked', true)
    }
})
$("#round-trip").click(() => {
    if ($("#round-trip").prop('checked') == true) {
        $("#EndDate").prop('disabled', false)
        $("#one-way").prop('checked', false)
    } else {
        $("#round-trip").prop('checked', true)
    }
})

let DateObject = new Date(), DayofMonth = DateObject.getDate()
if (DayofMonth < 10) {
    DayofMonth = "0" + DayofMonth
}
let CurrentDate = DateObject.getFullYear() + "-" + (DateObject.getMonth() + 1) + "-" + DayofMonth
let SearchInfo = {}
$("#StartDate").val(CurrentDate)
$("#StartDate").attr('min', CurrentDate)
$("#SearchButton").click((e) => {
    e.preventDefault()
    SearchInfo = {
        StartAirport: $("#StartAirport").val(),
        EndAirport: $("#EndAirport").val(),
        StartDate: $("#StartDate").val(),
        EndDate: $("#EndDate").val(),
        EndDate: $("#EndDate").val(),
        Adult: $(".adult span").text(),
        Children: $(".children span").text(),
        Toddler: $(".toddler span").text()
    }
    if (SearchInfo.StartAirport == null || SearchInfo.EndAirport == null) {
        alert("Vui lòng nhập sân bay đi và sân bay đến")
    } else if ($("#round-trip").prop("checked") == true && SearchInfo.EndDate == '') {
        alert("Vui lòng nhập ngày về")
    } else {
        localStorage.setItem("SearchInfo", JSON.stringify(SearchInfo))
        window.location.href = "flight-result.html"
    }
})
$("#round-trip").click(function () {
    $("#EndDate").val(CurrentDate)
    $("#EndDate").attr('min', CurrentDate)
})
$("#one-way").click(function () {
    $("#EndDate").val('')
})
export { ListOfDestinations }