import { DisplayData } from "./CRUD.js";
let CurrentPage = 1
DisplayData(CurrentPage, "../php/User/DisplayMember.php")
$(document).on('click', '.card-footer span', function () {
    CurrentPage = parseInt($(this).text())
    DisplayData(CurrentPage, "../php/User/DisplayMember.php")
})
function LockUnlock(ID, State) {
    $.ajax({
        url: "../php/User/LockAndUnlock.php",
        method: "post",
        data: { ID: ID, State: State },
        success: function (data) {
            if (data == "Success") {
                DisplayData(CurrentPage, "../php/User/DisplayMember.php")
            }
        }
    })
}
$(document).on("click", "#Lock", function () {
    let ID = $(this).parent().parent().attr("data-id")
    Swal.fire({
        position: 'center',
        icon: 'warning',
        html: '<h3>Khóa tài khoản của người dùng này?</h3>',
        confirmButtonText: "Đồng ý",
        showCancelButton: true,
        cancelButtonText: "Thoát"
    }).then((choice) => {
        if (choice.isConfirmed) {
            LockUnlock(ID, 0)
            Swal.fire({
                position: 'center',
                icon: 'info',
                html: '<h3>Đã khóa tài khoản</h3>'
            })
        }
    })
})
$(document).on("click", "#Unlock", function () {
    let ID = $(this).parent().parent().attr("data-id")
    LockUnlock(ID, 1)
    Swal.fire({
        position: 'center',
        icon: 'info',
        html: '<h3>Đã mở khóa tài khoản</h3>'
    })
})