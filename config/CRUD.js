function DisplayData(CurrentPage, url) {
    $.ajax({
        url: url,
        method: "post",
        data: { p: CurrentPage },
        success: function (result) {
            // alert(result)
            let Obj = JSON.parse(result)
            $("tbody").html(Obj.CardBody)
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
            alert(result);
            $("form")[0].reset();
            DisplayData(CurrentPage, displayurl);
        }
    })
}

function UpdateData(CurrentPage, DataObject, url, displayurl) {
    $.ajax({
        url: url,
        method: "post",
        data: { Employee: DataObject },
        success: function (result) {
            DisplayData(CurrentPage, displayurl);
            $("#myModal").modal("toggle")
            alert(result)
        }
    })
}

function DeleteData(CurrentPage, DataObject, url, displayurl) {
    $.ajax({
        url: url,
        method: "post",
        data: {
            ID: DataObject
        },
        success: function (result) {
            alert(result)
            DisplayData(CurrentPage, displayurl)
        }
    })
}
export { DisplayData, AddData, UpdateData, DeleteData }