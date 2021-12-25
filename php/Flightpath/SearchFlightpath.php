<?php require_once("../../class/flightpath.php");
$SearchString = $_POST["SearchString"];
$Query = " where ((a1.AirportName LIKE '%" . $SearchString . "%' and a2.AirportName not like '%" . $SearchString . "%' and c1.CityName not like '%" . $SearchString . "%' and c2.CityName not like '%" . $SearchString . "%' and PathID not like '%" . $SearchString . "%') or
(a1.AirportName not LIKE '%" . $SearchString . "%' and a2.AirportName like '%" . $SearchString . "%' and c1.CityName not like '%" . $SearchString . "%' and c2.CityName not like '%" . $SearchString . "%' and PathID not like '%" . $SearchString . "%') or
(a1.AirportName not LIKE '%" . $SearchString . "%' and a2.AirportName not like '%" . $SearchString . "%' and c1.CityName like '%" . $SearchString . "%' and c2.CityName not like '%" . $SearchString . "%' and PathID not like '%" . $SearchString . "%') or
(a1.AirportName not LIKE '%" . $SearchString . "%' and a2.AirportName not like '%" . $SearchString . "%' and c1.CityName not like '%" . $SearchString . "%' and c2.CityName like '%" . $SearchString . "%' and PathID not like '%" . $SearchString . "%') or
(a1.AirportName not LIKE '%" . $SearchString . "%' and a2.AirportName not like '%" . $SearchString . "%' and c1.CityName not like '%" . $SearchString . "%' and c2.CityName not like '%" . $SearchString . "%' and PathID like '%" . $SearchString . "%'))";
$FlightpathList = $FlightPathObject->GetFlightPath($Query);
$Array = array('CardBody' => '', 'CardFooter' => '', 'Page' => '');
foreach ($FlightpathList as $Flightpath) {
    $Array["CardBody"] .= '<tr data-endaid="' . $Flightpath["EndAirport"] . '" data-startaid="' . $Flightpath["StartAirport"] . '">
    <td>' . $Flightpath["PathID"] . '</td>
    <td>' . $Flightpath["AN1"] . ' ( ' . $Flightpath["CN1"] . ' )</td>
    <td>' . $Flightpath["AN2"] . ' ( ' . $Flightpath["CN2"] . ' )</td>
    <td>' . date("h", strtotime($Flightpath["Time"])) . ' giờ ' . date("i", strtotime($Flightpath["Time"])) . ' phút</td>
    <td><button id="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
    <td><button id="Edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></td>
</tr>';
}
die(json_encode($Array));
