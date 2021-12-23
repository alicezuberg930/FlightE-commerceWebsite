<?php require_once("../../class/airport.php");
$AirportInfo = array(
    "AirportID" => $_POST["AirportID"],
    "AirportName" => $_POST["AirportName"],
    "CityID" => $_POST["CityID"],
    "Length" => $_POST["Length"],
    "HiddenAirportID" => $_POST["HiddenAirportID"]
);
die($AirportObject->UpdateAirport($AirportInfo));
