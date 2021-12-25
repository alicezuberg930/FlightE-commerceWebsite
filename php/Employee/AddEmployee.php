<?php require_once("../../class/employee.php");
$User = $_POST["Object"];
$Fullname = $User["Fullname"];
$Email = $User["Email"];
$Password = $User["Password"];
$Phonenumber = $User["Phonenumber"];
$Gender = $User["Gender"];
die($EmployeeObject->AddEmployee($Fullname, $Email, $Password, $Phonenumber, $Gender));