<?php session_start();
require_once("../../class/member.php");
$Array = array("Email" => '', "Password" => '', "Username" => '', "State" => 1);
$email = $_POST["email"];
$password = $_POST["password"];
$User = $MemberObject->Login($email, "member");
$Employee = $MemberObject->Login($email, "employee");
if (empty($User) && empty($Employee)) {
    $Array["Email"] = "Email không tồn tại";
    $Array["Password"] = "Mật khẩu không đúng";
}
if (!empty($User)) {
    if ($User[0]["Password"] != $password) {
        $Array["Email"] = "";
        $Array["Password"] = "Mật khẩu không đúng";
    } else {
        $Array["Email"] = '';
        $Array["Password"] = '';
        $_SESSION["Member"] = $User;
        $Array["Username"]  = $User[0]["Fullname"];
        $Array["State"] = $User[0]["State"];
    }
}
if (!empty($Employee)) {
    if ($Employee[0]["Password"] != $password) {
        $Array["Password"] = "Mật khẩu không đúng";
    } else {
        $Array["Email"] = '';
        $Array["Password"] = '';
        $_SESSION["Employee"] = $Employee;
        $Array["Username"]  = $Employee[0]["Fullname"];
    }
}
die(json_encode($Array));
