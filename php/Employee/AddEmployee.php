<?php require_once("../../class/employee.php");
$User = $_POST["Object"];
$Fullname = $User["Fullname"];
$Email = $User["Email"];
$Password = $User["Password"];
$Phonenumber = $User["Phonenumber"];
$Gender = $User["Gender"];
$Query = $EmployeeObject->AddEmployee($Fullname, $Email, $Password, $Phonenumber, $Gender);
if ($Query == 1) {
    die("Thêm nhân viên thành công");
} else {
    die("Thêm nhân viên thất bại");
}
