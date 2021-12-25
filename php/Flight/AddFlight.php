<?php require_once("../../class/flight.php");
require_once("../../class/ticket.php");
$FlightTime = mysqli_fetch_row(Query("select Time from flightpath where PathID = '" . $_POST["PathID"] . "'"))[0];
$Time = explode(":", $FlightTime);
$CurrentDate = ($_POST["StartDate"] . "T" . $_POST["StartTime"]);
$CurrentDateClass = new DateTime($CurrentDate);
$ModifyDate =  ("+" . $Time[0] . " hour +" . $Time[1] . " minute");
$CurrentDateClass->modify($ModifyDate);
$PlaneDetails = explode("-", $_POST["Airplane"]);
$Array = array(
    'StartDate' => $_POST["StartDate"], 'StartTime' => $_POST["StartTime"], 'EndTime' => $CurrentDateClass->format("H:i:s"),
    'PlaneID' => $PlaneDetails[0], 'AirlineID' => $_POST["AirlineID"], 'PathID' => $_POST["PathID"], 'EndDate' => $CurrentDateClass->format("Y-m-d"),
    'AdultPrice' => $_POST["AdultPrice"], 'ChildrenPrice' => $_POST["ChildrenPrice"], 'ToddlerPrice' => $_POST["ToddlerPrice"]
);
$Query = $FlightObject->AddFlight($Array);
if ($Query == 1) {
    $FlightID = mysqli_fetch_row(Query("select max(FlightID) from flight"))[0];
    $Array = array('State' => 'Empty', 'SeatCode' => '', 'FlightID' => $FlightID, 'Class' => '');
    for ($row = 1; $row <= $PlaneDetails[1]; $row++) {
        $letter = "A";
        if ($row <= $PlaneDetails[3]) {
            $Array["Class"] = 'Business';
        } else {
            $Array["Class"] =  'Economy';
        }
        for ($column = 0; $column < $PlaneDetails[2]; $column++) {
            $Array["SeatCode"] = $row . $letter;
            $TicketObject->AddTicket($Array);
            $letter++;
        }
    }
    die("<h3>Thêm chuyến bay và tạo vé thành công</h3>");
} else {
    die("<h3>Thêm chuyến bay thất bại</h3>");
}
