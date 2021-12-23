import { isEmailValid, isPasswordValid, isPhonenumberValid } from "./Regex.js"
$.ajax({
    url: "../php/User/GetUserInfo.php",
    method: "get",
    success: function (data) {
        let Obj = JSON.parse(data)
        console.log(Obj)
        $("#Fullname").val(Obj.Fullname)
        $("#Email").val(Obj.Email)
        $("#Phonenumber").val(Obj.Phonenumber)
        $("input:radio[value=" + Obj.Gender + "]").prop("checked", true)
        if (Obj.hasOwnProperty("EmployeeID")) {
            $("#DeleteAccount").remove()
        }
    }
})
$("#SaveChange").click((e) => {
    e.preventDefault()
    let Gender = $("input:radio[name=gender]:checked").val(),
        Fullname = $("#Fullname").val(),
        Email = $("#Email").val(),
        Phonenumber = $("#Phonenumber").val(), a = 0, b = 0, c = 0
    if (Fullname.length < 7) {
        ErrorNotification($("#Fullname"), $(".check1"))
        a = 0
    } else {
        SuccessNotification($("#Fullname"), $(".check1"))
        a = 1
    }
    if (!isEmailValid(Email)) {
        ErrorNotification($("#Email"), $(".check2"))
        b = 0
    } else {
        SuccessNotification($("#Email"), $(".check2"))
        b = 1
    }
    if (!isPhonenumberValid(Phonenumber)) {
        ErrorNotification($("#Phonenumber"), $(".check3"))
        c = 0
    } else {
        SuccessNotification($("#Phonenumber"), $(".check3"))
        c = 1
    }
    if (a == 1 && b == 1 && c == 1) {
        $.ajax({
            url: "../php/User/UpdateMember.php",
            method: "post",
            data: { User: { Fullname: Fullname, Email: Email, Phonenumber: Phonenumber, Gender: Gender } },
            success: function (data) {
                if (data == 1) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        html: '<h4>Đã thay đổi thông tin</h4>',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    }
})
$("#DeleteAccount").click((e) => {
    e.preventDefault()
    Swal.fire({
        position: 'center',
        icon: 'success',
        html: '<h4>Bạn có chắc chắn không?</h4>',
        showConfirmButton: true,
        cancelButtonText: "Từ chối",
        confirmButtonText: "Đồng ý"
    }).then(promise => {
        if (promise.isConfirmed) {
            $.ajax({
                url: "../php/User/DeleteMember.php",
                method: "get",
                success: function (data) {
                    if (data == 1) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            html: '<h4>Tạm biệt</h4>',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(() => { window.location.href = "index.html" }, 1500)
                    }
                }
            })
        }
    })
})
$(document).on('click', "#ChangePassword", function (e) {
    e.preventDefault()
    $("#myModal").modal("toggle")
})
$(document).on("click", "#Confirm", function () {
    let NewPassword = $("#NewPassword").val(), RetypePassword = $("#RetypePassword").val(), a = 0, b = 0, c = 0
    if (!isPasswordValid(NewPassword)) {
        ErrorNotification($("#NewPassword"), $(".check5"))
        ErrorNotification($("#RetypePassword"), $(".check6"))
        a = 0
    } else {
        SuccessNotification($("#NewPassword"), $(".check5"))
        a = 1
    }
    if (NewPassword.length < 8 || NewPassword != RetypePassword) {
        ErrorNotification($("#RetypePassword"), $(".check6"))
        b = 0
    } else {
        SuccessNotification($("#RetypePassword"), $(".check6"))
        b = 1
    }
    if (a == 1 && b == 1) {
        $.ajax({
            url: "../php/User/ChangePassword.php",
            method: "post",
            data: { CurrentPassword: $("#CurrentPassword").val(), NewPassword: $("#NewPassword").val() },
            success: function (data) {
                if (data == 1) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        html: '<h4>Đã đổi mật khẩu</h4>',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#myModal").modal("toggle")
                    SuccessNotification($("#CurrentPassword"), $(".check4"))
                } else {
                    ErrorNotification($("#CurrentPassword"), $(".check4"))
                }
            }
        })
    }
})
let ErrorNotification = (Border, Span) => {
    Border.css("border-color", "#cf1414")
    Span.css("visibility", "visible")
}
let SuccessNotification = (Border, Span) => {
    Border.css("border", "1px solid #ced4da")
    Span.css("visibility", "hidden")
}