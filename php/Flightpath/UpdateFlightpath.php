<?php require_once("../../class/flightpath.php");
$FlightpathInfo = array(
    "PathID" =>  $_POST["FlightpathID"],
    "StartAirport" => $_POST["StartAirport"],
    "EndAirport" => $_POST["EndAirport"],
    "Time" => date("h:i", strtotime($_POST['Hour'] . ':' . $_POST["Minute"]))
);
die($FlightPathObject->UpdateFlightpath($FlightpathInfo));
