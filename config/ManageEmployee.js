import { DisplayData, AddData, UpdateData, DeleteData } from './CRUD.js';
import { isEmailValid, isPhonenumberValid } from './Regex.js';
let CurrentPage = 1
DisplayData(CurrentPage, "../php/Employee/DisplayEmployee.php")
$(document).on('click', '.card-footer span', function () {
    CurrentPage = parseInt($(this).text())
    DisplayData(CurrentPage, "../php/Employee/DisplayEmployee.php")
})
$("#Add").click((e) => {
    e.preventDefault()
    if (!isEmailValid($("#Email").val())) {
        alert("Email không hợp lệ")
        return
    }
    if (!isPhonenumberValid($("#Phonenumber").val())) {
        alert("Số điện thoại không hợp lệ")
        return
    }
    AddData(CurrentPage, {
        Fullname: $("#Fullname").val(),
        Email: $("#Email").val(),
        Password: $("#Password").val(),
        Phonenumber: $("#Phonenumber").val(),
        Gender: $("#Gender").val()
    }, "../php/Employee/AddEmployee.php", "../php/Employee/DisplayEmployee.php")
})
$(document).on('click', '#Delete', function () {
    let ID = $(this).parent().parent().find('td:nth-child(1)').text();
    let c = "<h3>Bạn có muốn xóa nhân viên " + $(this).parent().parent().find('td:nth-child(2)').text() + "?</h3>"
    Swal.fire({
        position: 'center',
        icon: 'warning',
        html: c,
        showCancelButton: true,
        cancelButtonText: "Thoát",
        confirmButtonText: "Đồng ý"
    }).then(re => {
        if (re.isConfirmed) {
            DeleteData(CurrentPage, ID, "../php/Employee/DeleteEmployee.php", "../php/Employee/DisplayEmployee.php", "<h3>Xóa thất bại</h3>")
        }
    })
})
$(document).on('click', '#Edit', function () {
    let ID = $(this).parent().parent().find('td:nth-child(1)').text(),
        Fullname = $(this).parent().parent().find('td:nth-child(2)').text(),
        Email = $(this).parent().parent().find('td:nth-child(3)').text(),
        Password = $(this).parent().parent().find('td:nth-child(4)').text(),
        Phonenumber = $(this).parent().parent().find('td:nth-child(5)').text(),
        Gender = $(this).parent().parent().find('td:nth-child(6)').text()
    $("#EmployeeID").val(parseInt(ID)), $("#TempFullname").val(Fullname), $("#TempEmail").val(Email),
        $("#TempPassword").val(Password), $("#TempPhonenumber").val(Phonenumber), $("#TempGender").val(Gender).change()
    $("#myModal").modal("toggle")
})

$("#Confirm").click(() => {
    UpdateData(CurrentPage, {
        EmployeeID: $("#EmployeeID").val(),
        Fullname: $("#TempFullname").val(),
        Email: $("#TempEmail").val(),
        Password: $("#TempPassword").val(),
        Phonenumber: $("#TempPhonenumber").val(),
        Gender: $("#TempGender").val()
    }, "../php/Employee/UpdateEmployee.php", "../php/Employee/DisplayEmployee.php")
})
$("#search").keyup(function () {
    if ($(this).val() == '') {
        DisplayData(CurrentPage, "../php/Employee/DisplayEmployee.php");
    }
    $.ajax({
        url: "../php/Employee/SearchEmployee.php",
        method: "post",
        data: { SearchString: $(this).val() },
        success: function (data) {
            console.log(data)
            let Obj = JSON.parse(data)
            $(".main-table tbody").html(Obj.CardBody)
        }
    })
})