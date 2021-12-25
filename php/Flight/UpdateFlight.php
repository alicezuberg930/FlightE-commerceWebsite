<?php require_once("../../class/flight.php");
$Time = mysqli_fetch_row(Query("select Time from flightpath where PathID = '" . $_POST["PathID"] . "'"))[0];
$Time = explode(":", $Time);
$CurrentDate = ($_POST["StartDate"] . "T" . $_POST["StartTime"]);
$CurrentDateClass = new DateTime($CurrentDate);
$ModifyDate =  ("+" . $Time[0] . " hour +" . $Time[1] . " minute");
$CurrentDateClass->modify($ModifyDate);
$Needles = [" ", "VND", ","];
$Array = array(
    "FlightID" => $_POST["FlightID"],
    "StartDate" => $_POST["StartDate"],
    "StartTime" => $_POST["StartTime"],
    "EndTime" => $CurrentDateClass->format("H:i:s"),
    "AirlineID" => $_POST["AirlineID"],
    "PathID" => $_POST["PathID"],
    "EndDate" =>  $CurrentDateClass->format("Y-m-d"),
    "AdultPrice" => str_replace($Needles, "", $_POST["AdultPrice"]),
    "ChildrenPrice" => str_replace($Needles, "", $_POST["ChilrenPrice"]),
    "ToddlerPrice" => str_replace($Needles, "", $_POST["ToddlerPrice"])
);
die($FlightObject->UpdateFlight($Array));
