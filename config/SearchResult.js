let SearchResult = JSON.parse(localStorage.getItem("SearchInfo"))
let DisplayData = () => {
    $.ajax({
        url: "../php/SearchList/ShowSearchList.php",
        method: "post",
        data: { SearchResult: SearchResult },
        success: function (result) {
            let Obj = JSON.parse(result)
            $(".flight-main-0").html(Obj.FirstList)
            if (Obj.SecondList != '') {
                $(".flight-main-1").html(Obj.SecondList)
            }
        }
    })
}
DisplayData()
$(document).on('click', '.expand-details', function () {
    let details = $(this).parent().parent().parent().find(".flight-box-detail"), arrow = $(this).find(".fa-chevron-down")
    if (details.attr("data-expand") == 0) {
        details.attr("data-expand", 1)
        details.css("height", "20.5rem")
        arrow.addClass("rotate")
    } else {
        details.attr("data-expand", 0)
        details.css("height", "0")
        arrow.removeClass("rotate")
    }
})
$(document).on("click", ".flight-main-0 .date-value", function () {
    let ChosenDate = $(this).children().eq(0).text().split("-")
    SearchResult.StartDate = ChosenDate[2] + "-" + ChosenDate[1] + "-" + (ChosenDate[0])
    if (new Date(parseInt(ChosenDate[2]), parseInt(ChosenDate[1]) - 1, parseInt(ChosenDate[0]), 23, 59, 59) < new Date()) {
        return;
    }
    localStorage.setItem("SearchInfo", JSON.stringify(SearchResult))
    DisplayData()
})
$(document).on("click", ".flight-main-1 .date-value", function () {
    let ChosenDate = $(this).children().eq(0).text().split("-")
    SearchResult.EndDate = ChosenDate[2] + "-" + ChosenDate[1] + "-" + ChosenDate[0]
    if (new Date(SearchResult.EndDate) < new Date()) {
        return;
    }
    localStorage.setItem("SearchInfo", JSON.stringify(SearchResult))
    DisplayData()
})
$("#takeoff-time-range").slider({
    range: true,
    min: 0,
    max: 24,
    values: [0, 24],
    slide: function (e, ui) {
        let ui1, ui2;
        if (ui.values[0] < 9) {
            ui1 = "0" + ui.values[0] + ":00"
        } else {
            ui1 = ui.values[0] + ":00"
        }
        if (ui.values[1] < 9) {
            ui2 = "0" + ui.values[1] + ":00"
        } else {
            ui2 = ui.values[1] + ":00"
        }
        $("#takeoff-start").text(ui1 + " h")
        $("#takeoff-end").text(ui2 + " h")
        SearchResult.StartTime = ui1 + "-" + ui2
        localStorage.setItem("SearchInfo", JSON.stringify(SearchResult))
        DisplayData()
    }
})
$("#landing-time-range").slider({
    range: true,
    min: 0,
    max: 24,
    values: [0, 24],
    slide: function (e, ui) {
        let ui1, ui2;
        if (ui.values[0] < 9) {
            ui1 = "0" + ui.values[0] + ":00"
        } else {
            ui1 = ui.values[0] + ":00"
        }
        if (ui.values[1] < 9) {
            ui2 = "0" + ui.values[1] + ":00"
        } else {
            ui2 = ui.values[1] + ":00"
        }
        $("#landing-start").text(ui1 + " h")
        $("#landing-end").text(ui2 + " h")
        SearchResult.EndTime = ui1 + "-" + ui2
        localStorage.setItem("SearchInfo", JSON.stringify(SearchResult))
        DisplayData()
    }
})
$(document).on("click", ".sort", function () {
    let SortValue = $(this).val()
    SearchResult.SortValue = SortValue
    localStorage.setItem("SearchInfo", JSON.stringify(SearchResult))
    DisplayData()
})
$(document).on('change', '.base-filter input', function () {
    let AirlineID = $(this).val()
    if (AirlineID == "all") {
        return;
    }
    SearchResult.AirlineID = AirlineID
    localStorage.setItem("SearchInfo", JSON.stringify(SearchResult))
    DisplayData()
})
window.onload = () => {
    SearchResult.SortValue = ''
    SearchResult.AirlineID = ''
    SearchResult.StartTime = ''
    SearchResult.EndTime = ''
    localStorage.setItem("SearchInfo", JSON.stringify(SearchResult))
}
