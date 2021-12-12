<?php require_once("../../class/flight.php");
$Flight = $_POST["Object"];
$PlaneDetais = explode("-", $Flight["PlaneDetails"]);
$TempTime = explode(":", $Flight["FlightTime"]);
$CurrentDate = ($Flight["StartDate"] . "T" . $Flight["StartTime"]);
$CurrentDateClass = new DateTime($CurrentDate);
$ModifyDate =  ("+" . $TempTime[0] . " hour +" . $TempTime[1] . " minute");
$CurrentDateClass->modify($ModifyDate);
$Array = array(
    'StartDate' => $Flight["StartDate"], 'StartTime' => $Flight["StartTime"], 'EndTime' => $CurrentDateClass->format("H:i:s"),
    'PlaneID' => $PlaneDetais[0], 'AirlineID' => $Flight["AirlineID"], 'PathID' => $Flight["PathID"], 'EndDate' => $CurrentDateClass->format("Y-m-d"),
    'AdultPrice' => $Flight["AdultPrice"], 'ChildrenPrice' => $Flight["ChildrenPrice"], 'ToddlerPrice' => $Flight["ToddlerPrice"]
);
$Query = $FlightObject->AddFlight($Array);
if ($Query == 1) {
    die("Thêm chuyến bay thành công");
} else {
    die("Thêm chuyến bay thất bại");
}