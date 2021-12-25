<?php require_once("../../class/member.php");
session_start();
$UserID = $_SESSION["Member"][0]["MemberID"];
echo ($MemberObject->DeleteMember($UserID));
session_unset();
die();
