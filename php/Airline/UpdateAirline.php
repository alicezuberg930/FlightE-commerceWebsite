<?php require_once("../../class/airline.php");
$AirlineImg = '';
if (isset($_POST["AirlineImage"])) {
    $AirlineImg = $_POST["AirlineImage"];
}
$AirlineInfo = array(
    "AirlineID" => $_POST["AirlineID"],
    "AirlineName" => $_POST["AirlineName"],
    "CountryID" => $_POST["CountryID"],
    "AirlineImage" => $AirlineImg,
    "HiddenAirlineID" => $_POST["HiddenAirlineID"]
);
die($AirlineObject->UpdateAirline($AirlineInfo));
