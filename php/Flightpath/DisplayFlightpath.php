<?php require_once("../../class/flightpath.php");
$Start = ($_POST["p"] - 1) * 10;
$FlightpathList = $FlightPathObject->GetFlightPath(" limit $Start,10");
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
$NumberOfPages = ceil(mysqli_num_rows(Query("select * from flightpath")) / 10);
for ($i = 1; $i <= $NumberOfPages; $i++) {
    $Array['CardFooter'] .= '<span>' . $i . '</span> ';
}
$Array['Page'] = $NumberOfPages;
die(json_encode($Array));
