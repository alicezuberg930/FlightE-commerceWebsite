<?php require_once("../../class/flight.php");
$Array = array('CardBody' => '', 'CardFooter' => '', 'Page' => '');
$Start = ($_POST["p"] - 1) * 10;
$FlightList = $FlightObject->GetFlight($Start, 10);
foreach ($FlightList as $Flight) {
    $CurrentDateClass = new DateTime($Flight["StartDate"]);
    $Array['CardBody'] .= '<tr class="FlightRow">
        <td id="Time" style="display: none;">' . $Flight["Time"] . '</td>
        <td>' . $Flight["FlightID"] . '</td>
        <td>' . $CurrentDateClass->format("d-m-Y")  . '</td>
        <td>' . $Flight["StartTime"] . '</td>
        <td>' . $Flight["PlaneName"] . '</td>
        <td>' . $Flight["AirlineName"] . '</td>
        <td>' . $Flight["PathID"] . '</td>
        <td>' . number_format($Flight["AdultPrice"]) . ' VND</td>
        <td>' . number_format($Flight["ChildrenPrice"]) . ' VND</td>
        <td>' . number_format($Flight["ToddlerPrice"]) . ' VND</td>
        <td><button id="Delete" class="btn btn-danger btn-sm">Xóa</button></td>
        <td><button id="Edit" class="btn btn-warning btn-sm">Sửa</button></td>
    </tr>';
}
$NumberOfPages = ceil(mysqli_num_rows(Query("select * from flight")) / 10);
for ($i = 1; $i <= $NumberOfPages; $i++) {
    $Array['CardFooter'] .= '<span>' . $i . '</span> ';
}
$Array['Page'] = $NumberOfPages;
die(json_encode($Array));
