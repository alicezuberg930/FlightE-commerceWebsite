<?php session_start();
$Member = $Employee = $State = array("Membername" => '', "Employeename" => '', "Email" => '');
if (isset($_SESSION["Member"])) {
    $Member = $_SESSION["Member"];
    $State["Membername"] = $Member[0]["Fullname"];
}
if (isset($_SESSION["Employee"])) {
    $Employee = $_SESSION["Employee"];
    $State["Employeename"] = $Employee[0]["Fullname"];
    $State["Email"] = $Employee[0]["Email"];
}
die(json_encode($State));
