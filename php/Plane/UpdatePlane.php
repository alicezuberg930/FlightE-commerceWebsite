<?php require_once("../../class/plane.php");
$PlaneInfo = array(
    "PlaneID" => $_POST["PlaneID"],
    "PlaneName" => $_POST["PlaneName"],
    "Rows" => $_POST["Rows"],
    "Columns" => $_POST["Columns"],
    "BusinessRow" => $_POST["BusinessRow"],
    "SeatAmount" => $_POST["Rows"] * $_POST["Columns"],
    "HiddenPlaneID" => $_POST["HiddenPlaneID"]
);
die($PlaneObject->UpdatePlane($PlaneInfo));
