<?php require_once("../../class/flight.php");
$SearchString = str_replace([' ', 'VND', ','], '', $_POST["SearchString"]);
$Array = array('CardBody' => '', 'CardFooter' => '', 'Page' => '');
$Query = " and ((PlaneName LIKE '%" . $SearchString . "%' and AirlineName not like '%" . $SearchString . "%' and AdultPrice not like '%" . $SearchString . "%' and ChildrenPrice not like '%" . $SearchString . "%' and ToddlerPrice not like '%" . $SearchString . "%' and StartDate not like '%" . $SearchString . "%' and StartTime not like '%" . $SearchString . "%') or
(PlaneName not LIKE '%" . $SearchString . "%' and AirlineName like '%" . $SearchString . "%' and AdultPrice not like '%" . $SearchString . "%' and ChildrenPrice not like '%" . $SearchString . "%' and ToddlerPrice not like '%" . $SearchString . "%' and StartDate not like '%" . $SearchString . "%' and StartTime not like '%" . $SearchString . "%') or
(PlaneName not LIKE '%" . $SearchString . "%' and AirlineName not like '%" . $SearchString . "%' and AdultPrice like '%" . $SearchString . "%' and ChildrenPrice not like '%" . $SearchString . "%' and ToddlerPrice not like '%" . $SearchString . "%' and StartDate not like '%" . $SearchString . "%' and StartTime not like '%" . $SearchString . "%') or
(PlaneName not LIKE '%" . $SearchString . "%' and AirlineName not like '%" . $SearchString . "%' and AdultPrice not like '%" . $SearchString . "%' and ChildrenPrice like '%" . $SearchString . "%' and ToddlerPrice not like '%" . $SearchString . "%' and StartDate not like '%" . $SearchString . "%' and StartTime not like '%" . $SearchString . "%') or
(PlaneName not LIKE '%" . $SearchString . "%' and AirlineName not like '%" . $SearchString . "%' and AdultPrice not like '%" . $SearchString . "%' and ChildrenPrice not like '%" . $SearchString . "%' and ToddlerPrice like '%" . $SearchString . "%' and StartDate not like '%" . $SearchString . "%' and StartTime not like '%" . $SearchString . "%') or
(PlaneName not LIKE '%" . $SearchString . "%' and AirlineName not like '%" . $SearchString . "%' and AdultPrice not like '%" . $SearchString . "%' and ChildrenPrice not like '%" . $SearchString . "%' and ToddlerPrice not like '%" . $SearchString . "%' and StartDate like '%" . $SearchString . "%' and StartTime not like '%" . $SearchString . "%') or
(PlaneName not LIKE '%" . $SearchString . "%' and AirlineName not like '%" . $SearchString . "%' and AdultPrice not like '%" . $SearchString . "%' and ChildrenPrice not like '%" . $SearchString . "%' and ToddlerPrice not like '%" . $SearchString . "%' and StartDate not like '%" . $SearchString . "%' and StartTime like '%" . $SearchString . "%'))";
$FlightList = $FlightObject->SearchFlight($Query);
foreach ($FlightList as $Flight) {
    $CurrentDateClass = new DateTime($Flight["StartDate"]);
    $Array['CardBody'] .= '<tr class="FlightRow" data-airlineID="' . $Flight["AirlineID"] . '">
        <td id="Time" style="display: none;">' . $Flight["Time"] . '</td>
        <td>' . $Flight["FlightID"] . '</td>
        <td>' . $CurrentDateClass->format("d-m-Y")  . '</td>
        <td>' . date("H:i", strtotime($Flight["StartTime"])) . '</td>
        <td>' . $Flight["PlaneName"] . '</td>
        <td>' . $Flight["AirlineName"] . '</td>
        <td>' . $Flight["PathID"] . '</td>
        <td>' . number_format($Flight["AdultPrice"]) . ' VND</td>
        <td>' . number_format($Flight["ChildrenPrice"]) . ' VND</td>
        <td>' . number_format($Flight["ToddlerPrice"]) . ' VND</td>
        <td><button id="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
        <td><button id="Edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></td>
        <td><button id="detail" class="btn bg-info btn-sm"><i class="fas fa-info-circle"></i></button></td>
    </tr>';
}
die(json_encode($Array));
