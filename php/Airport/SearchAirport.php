<?php require_once("../../class/airport.php");
$SearchString = $_POST["SearchString"];
$Query = " and ((AirportID LIKE '%" . $SearchString . "%' and AirportName not like '%" . $SearchString . "%' and CityName not like '%" . $SearchString . "%' and CountryName not like '%" . $SearchString . "%') or
(AirportID not LIKE '%" . $SearchString . "%' and AirportName like '%" . $SearchString . "%' and CityName not like '%" . $SearchString . "%' and CountryName not like '%" . $SearchString . "%') or
(AirportID not LIKE '%" . $SearchString . "%' and AirportName not like '%" . $SearchString . "%' and CityName like '%" . $SearchString . "%' and CountryName not like '%" . $SearchString . "%') or
(AirportID not LIKE '%" . $SearchString . "%' and AirportName not like '%" . $SearchString . "%' and CityName not like '%" . $SearchString . "%' and CountryName like '%" . $SearchString . "%'))";
$AirportList = $AirportObject->SearchAirport($Query);
$String = '';
foreach ($AirportList as $Airport) {
    $String .= '<tr data-cityid="' . $Airport["CityID"] . '">
    <td>' . $Airport["AirportID"] . '</td>
    <td>' . $Airport["AirportName"] . '</td>
    <td>' . $Airport["CityName"] . '</td>
    <td>' . $Airport["Length"] . ' km</td>
    <td>' . $Airport["CountryName"] . '</td>
    <td><button id="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
    <td><button id="Edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></td>
</tr>';
}
die($String);
