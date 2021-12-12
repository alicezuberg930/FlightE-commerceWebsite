import { DisplayData, AddData, UpdateData, DeleteData } from './CRUD.js';
let CurrentPage = 1
DisplayData(CurrentPage, "../php/Employee/DisplayEmployee.php")
$(document).on('click', '.card-footer span', function () {
    CurrentPage = parseInt($(this).text())
    DisplayData(CurrentPage, "../php/Employee/DisplayEmployee.php")
})
$("#Add").click((e) => {
    e.preventDefault()
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
    let c = confirm("Bạn có muốn xóa nhân viên " + $(this).parent().parent().find('td:nth-child(2)').text() + "?")
    if (c == true) {
        DeleteData(CurrentPage, ID, "../php/Employee/DeleteEmployee.php", "../php/Employee/DisplayEmployee.php")
    }
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