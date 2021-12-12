$(document).on("click", ".ReChoose", function () {
    DisplayData()
})
$(document).on("click", ".OrderTicket", function () {
    $.ajax({
        url: "../php/Ticket/PrintTicket.php",
        method: "post",
        data: { PlaneID: $(this).attr("data-plane"), FlightID: $(this).attr("data-flight") },
        success: function (data) {
            $(".flight-main-0").html(data)
        }
    })
})
let i = 0
let number = parseInt(SearchResult.Adult) + parseInt(SearchResult.Children) + parseInt(SearchResult.Toddler)
$(document).on("click", ".seat", function () {
    let SeatCode = $(this).attr("data-seat"), State = $(this).attr("data-state"), TicketID = $(this).attr("data-ticket"),
        Class = $(this).attr("data-class")
    if (SeatCode == undefined || State == "Occupied") {
        return
    }
    if ($(this).hasClass("Occupied")) {
        $(this).removeClass("Occupied")
        RemoveCustomer(SeatCode)
        i--
    } else {
        if (i < number) {
            $(this).addClass("Occupied")
            AppendCustomer(SeatCode, TicketID, Class, SearchResult.Adult, SearchResult.Children, SearchResult.Toddler)
            i++
        }
    }
})
function RemoveCustomer(SeatCode) {
    let row1 = document.querySelectorAll(".row-1")
    row1.forEach(data => {
        if (data.className.includes(SeatCode)) {
            data.nextElementSibling.remove()
            data.previousElementSibling.remove()
            data.remove()
        }
    })
}
function AppendCustomer(SeatCode, Ticket, Class, Adult, Children, Toddler) {
    $.ajax({
        url: "../php/Ticket/UserInfo.php",
        method: "post",
        data: { SeatCode: SeatCode, Adult: Adult, Children: Children, Toddler: Toddler, Ticket: Ticket, Class: Class },
        success: function (data) { $("#customer-info tbody").append(data) }
    })
}
function isEmailValid(email) {
    return /^[a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1}([a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1})*[a-zA-Z0-9]@[a-zA-Z0-9][-\.]{0,1}([a-zA-Z][-\.]{0,1})*[a-zA-Z0-9]\.[a-zA-Z0-9]{1,}([\.\-]{0,1}[a-zA-Z]){0,}[a-zA-Z0-9]{0,}$/.test(email)
}
$(document).on("click", "#pay", function () {
    if (i < number) {
        alert("Chưa chọn đủ hành khách")
        return
    }
    let OrderDetails = {
        CustomerInfo: [],
        ContactEmail: '',
        ContactName: '',
        Address: '',
        FlightID: ''
    }
    let customerinfo = document.querySelectorAll(".row-1"),
        baggage = document.querySelectorAll(".row-2"),
        contactinfo = document.querySelector(".row-3")
    for (j = 0; j < i; j++) {
        let TicketID = baggage[j].children[0].children[0].children[0].getAttribute("data-ticket"),
            PassengerName = customerinfo[j].children[1].children[0].children[0],
            Age = customerinfo[j].children[0].children[0].children[0].value,
            BaggagePrice = baggage[j].children[1].children[0].children[0].value.split('-')[0],
            BaggageWeight = baggage[j].children[1].children[0].children[0].value.split('-')[1],
            SeatCode = baggage[j].children[0].children[0].children[0].value,
            Class = baggage[j].children[0].children[0].children[0].getAttribute("data-class")
        if (PassengerName.value.length <= 7) {
            PassengerName.style.border = "1px solid red"
            return
        }
        PassengerName.style.border = "1px solid #ced4da"
        OrderDetails.CustomerInfo.push({
            TicketID: TicketID, PassengerName: PassengerName.value, Age: Age, BaggagePrice: BaggagePrice,
            BaggageWeight: BaggageWeight, SeatCode: SeatCode, Class: Class
        })

    }
    OrderDetails.FlightID = $(".seat-list").attr("data-flight")
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