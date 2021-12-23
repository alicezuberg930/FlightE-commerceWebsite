<?php require_once("../../class/airline.php");
$AirlineInfo = array(
    "AirlineID" => $_POST["AirlineID"],
    "AirlineName" => $_POST["AirlineName"],
    "CountryID" => $_POST["CountryID"],
    "AirlineImage" => $_POST["AirlineImage"]
);
die($AirlineObject->AddAirline($AirlineInfo));
