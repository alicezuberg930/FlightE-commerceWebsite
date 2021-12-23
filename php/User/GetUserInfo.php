<?php require_once("../../class/member.php");
session_start();
$UserID = $Table = $IDType = '';
if (isset($_SESSION["Member"])) {
    $UserID = $_SESSION["Member"][0]["MemberID"];
    $Table = 'member';
    $IDType = 'MemberID';
} else {
    $UserID = $_SESSION["Employee"][0]["EmployeeID"];
    $Table = 'employee';
    $IDType = 'EmployeeID';
}
$Member = $MemberObject->GetSpecificMember($UserID, $Table, $IDType);
die(json_encode($Member[0]));
