<?php require_once("../../class/ticket.php");
$PlaneDetais = explode("-", $_POST["PlaneDetails"]);
$FlightID = mysqli_fetch_row(Query("select max(FlightID) as ID from flight"))[0];
$String = $Class = $HTML = '';
$Array = array('State' => 'Empty', 'SeatCode' => '', 'FlightID' => $FlightID, 'Class' => '');
for ($row = 1; $row <= $PlaneDetais[1]; $row++) {
    $letter = "A";
    if ($row <= $PlaneDetais[3]) {
        $Array["Class"] = 'Business';
    } else {
        $Array["Class"] =  'Economy';
    }
    for ($column = 0; $column < $PlaneDetais[2]; $column++) {
        $Array["SeatCode"] = $row . $letter;
        $HTML .= json_encode($Array);
        $TicketObject->AddTicket($Array);
        $letter++;
    }
}
die("Các vé đã được tạo thành công");
