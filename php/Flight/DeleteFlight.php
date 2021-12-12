<?php require_once("../../class/flight.php");
$Query = $FlightObject->DeleteFlight($_POST["ID"]);
if ($Query == 1) {
    die("Xóa chuyến bay thành công");
} else {
    die("Xóa chuyến bay thất bại");
}
