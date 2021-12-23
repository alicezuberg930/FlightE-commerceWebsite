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
                alert(result);
                $("form")[0].reset();
                DisplayData(CurrentPage, displayurl);
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
                DisplayData(CurrentPage, displayurl);
                $("#myModal").modal("toggle")
                alert(result)
            }
        }
    })
}

function DeleteData(CurrentPage, DataObject, url, displayurl, Notification) {
    $.ajax({
        url: url,
        method: "post",
        data: {
            ID: DataObject
        },
        success: function (result) {
            if (result == 1) {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    html: '<h3>Xóa thành công</h3>',
                    showConfirmButton: false,
                })
                DisplayData(CurrentPage, displayurl)
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    html: Notification,
                    showConfirmButton: false,
                })
            }
        }
    })
}
export { DisplayData, AddData, UpdateData, DeleteData }