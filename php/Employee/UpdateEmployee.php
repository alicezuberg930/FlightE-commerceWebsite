<?php require_once("../../class/employee.php");
$User = $_POST["Employee"];
$ID = $User["EmployeeID"];
$Fullname = $User["Fullname"];
$Email = $User["Email"];
$Password = $User["Password"];
$Phonenumber = $User["Phonenumber"];
$Gender = $User["Gender"];
die($EmployeeObject->UpdateEmployee($ID, $Fullname, $Email, $Password, $Phonenumber, $Gender));
