<?php require_once("../../class/member.php");
session_start();
$ID = $Table = $IDType = '';
if (isset($_SESSION["Member"])) {
    $ID = $_SESSION["Member"][0]["MemberID"];
    $Table = 'member';
    $IDType = 'MemberID';
} else {
    $ID = $_SESSION["Employee"][0]["EmployeeID"];
    $Table = 'employee';
    $IDType = 'EmployeeID';
}
$User = array(
    "ID" => $ID, "Fullname" => $_POST["User"]["Fullname"], "Email" => $_POST["User"]["Email"],
    "Phonenumber" => $_POST["User"]["Phonenumber"], "Gender" => $_POST["User"]["Gender"]
);
die($MemberObject->UpdateMember($User, $Table, $IDType));
