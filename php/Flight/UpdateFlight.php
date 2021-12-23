<?php require_once("../../class/flight.php");
$Time = mysqli_fetch_row(Query("select Time from flightpath where PathID = '" . $_POST["TempFlightpath"] . "'"))[0];
$TempTime = explode(":", $Time);
$CurrentDate = ($_POST["TempStartDate"] . "T" . $_POST["TempStartTime"]);
$CurrentDateClass = new DateTime($CurrentDate);
$ModifyDate =  ("+" . $TempTime[0] . " hour +" . $TempTime[1] . " minute");
$CurrentDateClass->modify($ModifyDate);
$Needles = [" ", "VND", ","];
$Array = array(
    "FlightID" => $_POST["FlightID"],
    "StartDate" => $_POST["TempStartDate"],
    "StartTime" => $_POST["TempStartTime"],
    "EndTime" => $CurrentDateClass->format("H:i:s"),
    "AirlineID" => $_POST["TempAirline"],
    "PathID" => $_POST["TempFlightpath"],
    "EndDate" =>  $CurrentDateClass->format("Y-m-d"),
    "AdultPrice" => str_replace($Needles, "", $_POST["TempAdultPrice"]),
    "ChildrenPrice" => str_replace($Needles, "", $_POST["TempChilrenPrice"]),
    "ToddlerPrice" => str_replace($Needles, "", $_POST["TempToddlerPrice"])
);
die($FlightObject->UpdateFlight($Array));
