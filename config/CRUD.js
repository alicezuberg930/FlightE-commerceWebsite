function DisplayData(CurrentPage, url) {
    $.ajax({
        url: url,
        method: "post",
        data: { p: CurrentPage },
        success: function (result) {
            // console.log(result)
            let Obj = JSON.parse(result)
            $(".main-table tbody").html(Obj.CardBody)
            $(".card-footer").html(Obj.CardFooter)
        }
    })
}

function AddData(CurrentPage, DataObject, url, displayurl) {
    $.ajax({
        url: url,
        method: "post",
        data: { Object: DataObject },
        success: function (result) {
            if (result == 1) {
                Swal.fire({
                    text: 'Thêm thông tin thành công',
                    position: "bottom-end",
                    timer: 1500,
                    icon: 'success',
                    timerProgressBar: true,
                    showConfirmButton: false
                })
                $("form")[0].reset();
                DisplayData(CurrentPage, displayurl);
            } else {
                Swal.fire({
                    text: 'Trùng thông tin',
                    position: "bottom-end",
                    timer: 1500,
                    icon: 'error',
                    timerProgressBar: true,
                    showConfirmButton: false
                })
            }
        }
    })
}

function UpdateData(CurrentPage, DataObject, url, displayurl) {
    $.ajax({
        url: url,
        method: "post",
        data: { Employee: DataObject },
        success: function (result) {
            if (result == 1) {
                Swal.fire({
                    text: 'Sửa thông tin thành công',
                    position: "bottom-end",
                    icon: 'success',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: false
                })
                DisplayData(CurrentPage, displayurl);
                $("#myModal").modal("toggle")
            } else {
                Swal.fire({
                    text: 'Sửa thông tin thất bại',
                    position: "bottom-end",
                    icon: 'error',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: false
                })
            }
        }
    })
}

function DeleteData(CurrentPage, DataObject, url, Notification) {
    $.ajax({
        url: url,
        method: "post",
        data: {
            ID: DataObject
        },
        success: function (data) {
            if (data == 1) {
                Swal.fire({
                    text: 'Xóa thông tin thành công',
                    position: "bottom-end",
                    icon: 'success',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: false
                })
                DisplayData(CurrentPage, displayurl)
            } else {
                Swal.fire({
                    text: Notification,
                    position: "bottom-end",
                    icon: 'error',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: false
                })
            }
        }
    })
}
export { DisplayData, AddData, UpdateData, DeleteData }