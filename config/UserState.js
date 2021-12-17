$.ajax({
    url: "../php/LoginRegister/UserState.php",
    method: "get",
    success: function (data) {
        let Obj = JSON.parse(data)
        if (Obj.Membername != '' || Obj.Employeename != '') {
            $("#login-register").css("display", "none")
        }
        if (Obj.Membername == '' && Obj.Employeename == '') {
            $("#logout").css("display", "none")
            $("#orders").css("display", "none")
            $("#username").css("display", "none")
            $("#management").css('display', "none")
        }
        if (Obj.Membername != '') {
            $("#management").css('display', "none")
            $("#username a span").text(Obj.Membername)
        }
        if (Obj.Employeename != '') {
            $("#orders").css("display", "none")
            $("#username a span").text(Obj.Employeename)
        }
    }
})