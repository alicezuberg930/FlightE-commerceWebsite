// function Rechoose(element) {
$(document).on("click", ".ReChoose", function () {
    // $.ajax({
    //     url: "../php/SearchList/ShowSearchList.php",
    //     method: "post",
    //     data: { SearchResult: SearchResult },
    //     success: function (result) {
    //         let Obj = JSON.parse(result)
    //         $(".flight-main-0").html(Obj.FirstList)
    //         if (Obj.SecondList != '') {
    //             $(".flight-main-1").html(Obj.SecondList)
    //         }
    //     }
    // })
    i = 0, j = 0
    DisplayData()
})
// }
// Rechoose(".flight-main-0 .ReChoose")
// Rechoose(".flight-main-1 .ReChoose")
function Order(element, type) {
    $(document).on("click", element, function () {
        $.ajax({
            url: "../php/Ticket/PrintTicket.php",
            method: "post",
            data: { PlaneID: $(this).attr("data-plane"), FlightID: $(this).attr("data-flight"), type: type },
            success: function (data) {
                if (data == "Error") {
                    Swal.fire({
                        icon: 'warning',
                        html: '<h4>Bạn phải đăng nhập mới có thể đặt vé</h4>',
                        showCancelButton: true,
                        confirmButtonText: 'Đăng nhập',
                        cancelButtonText: 'Thoát',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "login-register.php";
                        }
                    })
                } else {
                    $(element.split(" ")[0]).html(data)
                    if (SearchResult.EndDate != '') {
                        $(".flight-main-0 .contact-info").remove()
                    }
                }
            }
        })
    })
}
Order(".flight-main-0 .OrderTicket", "Chuyến Đi")
Order(".flight-main-1 .OrderTicket", "Chuyến Về")
let i = 0, j = 0, number = parseInt(SearchResult.Adult) + parseInt(SearchResult.Children) + parseInt(SearchResult.Toddler)
$(document).on("click", ".flight-main-0 .seat", function () {
    let SeatCode = $(this).attr("data-seat"), State = $(this).attr("data-state"), TicketID = $(this).attr("data-ticket"),
        Class = $(this).attr("data-class")
    if (SeatCode == undefined || State == "Occupied") {
        return
    }
    if ($(this).hasClass("Occupied")) {
        $(this).removeClass("Occupied")
        RemoveCustomer(".flight-main-0", SeatCode)
        i--
    } else {
        if (i < number) {
            $(this).addClass("Occupied")
            AppendCustomer(".flight-main-0", SeatCode, TicketID, Class, "Chuyến đi")
            i++
        }
    }
})
$(document).on("click", ".flight-main-1 .seat", function () {
    let SeatCode = $(this).attr("data-seat"), State = $(this).attr("data-state"), TicketID = $(this).attr("data-ticket"),
        Class = $(this).attr("data-class")
    if (SeatCode == undefined || State == "Occupied") {
        return
    }
    if ($(this).hasClass("Occupied")) {
        $(this).removeClass("Occupied")
        RemoveCustomer(".flight-main-1", SeatCode)
        j--
    } else {
        if (j < number) {
            $(this).addClass("Occupied")
            AppendCustomer(".flight-main-1", SeatCode, TicketID, Class, "Chuyến Về")
            j++
        }
    }
})
function RemoveCustomer(Element, SeatCode) {
    let row1 = document.querySelectorAll(Element + " .row-1")
    row1.forEach(data => {
        if (data.className.includes(SeatCode)) {
            data.nextElementSibling.remove()
            data.previousElementSibling.remove()
            data.remove()
        }
    })
}
function AppendCustomer(Element, SeatCode, Ticket, Class, Type) {
    $.ajax({
        url: "../php/Ticket/UserInfo.php",
        method: "post",
        data: { SeatCode: SeatCode, Ticket: Ticket, Class: Class, Type: Type },
        success: function (data) { $(Element + " #customer-info tbody").append(data) }
    })
}
function isEmailValid(email) {
    return /^[a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1}([a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1})*[a-zA-Z0-9]@[a-zA-Z0-9][-\.]{0,1}([a-zA-Z][-\.]{0,1})*[a-zA-Z0-9]\.[a-zA-Z0-9]{1,}([\.\-]{0,1}[a-zA-Z]){0,}[a-zA-Z0-9]{0,}$/.test(email)
}
$(document).on("click", "#pay", function () {
    if (i < number || (SearchResult.EndDate != '' && j < number)) {
        alert("Chưa chọn đủ hành khách")
        return
    }
    let OrderDetails = { CustomerInfo: [] }
    if (SearchResult.EndDate != '') {
        OrderDetails.ReturnFlight = $(".flight-main-1 .seat-list").attr("data-flight")
        i = i + j;
    }
    OrderDetails.StartFlight = $(".flight-main-0 .seat-list").attr("data-flight")
    let customerinfo = document.querySelectorAll(".row-1"),
        baggage = document.querySelectorAll(".row-2"),
        contactinfo = document.querySelector(".row-3")
    for (cus = 0; cus < i; cus++) {
        let TicketID = baggage[cus].children[0].children[0].children[0].getAttribute("data-ticket"),
            PassengerName = customerinfo[cus].children[1].children[0].children[0],
            Age = customerinfo[cus].children[0].children[0].children[0].value,
            BaggagePrice = baggage[cus].children[1].children[0].children[0].value.split('-')[0],
            BaggageWeight = baggage[cus].children[1].children[0].children[0].value.split('-')[1],
            SeatCode = baggage[cus].children[0].children[0].children[0].value,
            Class = baggage[cus].children[0].children[0].children[0].getAttribute("data-class"),
            Type = customerinfo[cus].getAttribute("data-type")
        if (PassengerName.value.length <= 7) {
            PassengerName.style.border = "1px solid red"
            return
        }
        PassengerName.style.border = "1px solid #ced4da"
        OrderDetails.CustomerInfo.push({
            TicketID: TicketID, PassengerName: PassengerName.value, Age: Age, BaggagePrice: BaggagePrice,
            BaggageWeight: BaggageWeight, SeatCode: SeatCode, Class: Class, Type: Type
        })
    }
    let ContactEmail = contactinfo.children[0].children[0].children[0].value, e = 0,
        ContactName = contactinfo.children[1].children[0].children[0].value, c = 0,
        Address = contactinfo.children[2].children[0].children[0].value, a = 0
    if (!isEmailValid(ContactEmail)) { $("#input-email").css("border", "1px solid red"), e = 0 }
    else { $("#input-email").css("border", "1px solid #ced4da"), OrderDetails.ContactEmail = ContactEmail, e = 1 }
    if (ContactName.length == 0) { $("#input-contactname").css("border", "1px solid red"), c = 0 }
    else { $("#input-contactname").css("border", "1px solid #ced4da"), OrderDetails.ContactName = ContactName, c = 1 }
    if (Address.length == 0) { $("#input-address").css("border", "1px solid red"), a = 0 }
    else { $("#input-address").css("border", "1px solid #ced4da"), OrderDetails.Address = Address, a = 1 }
    if (a == 1 && c == 1 && e == 1) {
        $.ajax({
            url: "../php/Order/ReservationOrder.php",
            method: "post",
            data: { OrderDetails: OrderDetails },
            success: function (data) {
                let Obj = JSON.parse(data)
                if (Obj.OrderCheck == 1 && Obj.OrderDetailCheck == 1) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        html: '<h4>Đơn đặt hàng của bạn đã thành công</h4>',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        html: '<h4>Đơn đặt hàng của bạn đã thất bại</h4>',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    }
})