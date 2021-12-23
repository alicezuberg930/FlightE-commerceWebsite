<?php require_once("../../class/airport.php");
$Start = ($_POST["p"] - 1) * 10;
$AirportList = $AirportObject->GetAirport($Start, 10);
$Array = array('CardBody' => '', 'CardFooter' => '', 'Page' => '');
foreach ($AirportList as $Airport) {
    $Array["CardBody"] .= '<tr data-cityid="' . $Airport["CityID"] . '">
    <td>' . $Airport["AirportID"] . '</td>
    <td>' . $Airport["AirportName"] . '</td>
    <td>' . $Airport["CityName"] . '</td>
    <td>' . $Airport["Length"] . ' km</td>
    <td>' . $Airport["CountryName"] . '</td>
    <td><button id="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
    <td><button id="Edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></td>
</tr>';
}
$NumberOfPages = ceil(mysqli_num_rows(Query("select * from airport")) / 10);
for ($i = 1; $i <= $NumberOfPages; $i++) {
    $Array['CardFooter'] .= '<span>' . $i . '</span> ';
}
$Array['Page'] = $NumberOfPages;
die(json_encode($Array));
