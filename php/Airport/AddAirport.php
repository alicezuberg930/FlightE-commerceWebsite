<?php require_once("../../class/airport.php");
$AirportInfo = array(
    "AirportID" => $_POST["AirportID"],
    "AirportName" => $_POST["AirportName"],
    "CityID" => $_POST["CityID"],
    "Length" => $_POST["Length"]
);
die($AirportObject->AddAirport($AirportInfo));
