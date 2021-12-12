<?php require_once("../../class/employee.php");
$User = $_POST["Employee"];
$ID = $User["EmployeeID"];
$Fullname = $User["Fullname"];
$Email = $User["Email"];
$Password = $User["Password"];
$Phonenumber = $User["Phonenumber"];
$Gender = $User["Gender"];
$Query = $EmployeeObject->UpdateEmployee($ID, $Fullname, $Email, $Password, $Phonenumber, $Gender);
if ($Query == 1) {
    die("Cập nhật nhân viên " . $Fullname . " thành công");
} else {
    die("Cập nhật nhân viên " . $Fullname . " thất bại");
}