<?php require_once("../../class/member.php");
session_start();
$User = $UserID = $Table = $IDType = '';
if (isset($_SESSION["Member"])) {
    $User = $_SESSION["Member"];
    $UserID = $_SESSION["Member"][0]["MemberID"];
    $Table = 'member';
    $IDType = 'MemberID';
} else {
    $User = $_SESSION["Employee"];
    $UserID = $_SESSION["Employee"][0]["EmployeeID"];
    $Table = 'employee';
    $IDType = 'EmployeeID';
}
if ($_POST["CurrentPassword"] != $User[0]["Password"])
    die("Sai mật khẩu");
die($MemberObject->ChangePassword(array("ID" => $UserID, "Password" => $_POST["NewPassword"]), $Table, $IDType));
