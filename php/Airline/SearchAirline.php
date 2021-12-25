<?php require_once("../../class/airline.php");
$SearchString  = $_POST["SearchString"];
$Query = " and ((AirlineID LIKE '%" . $SearchString . "%' and AirlineName not like '%" . $SearchString . "%' and CountryName not like '%" . $SearchString . "%') or
(AirlineID not LIKE '%" . $SearchString . "%' and AirlineName like '%" . $SearchString . "%' and CountryName not like '%" . $SearchString . "%') or
(AirlineID not LIKE '%" . $SearchString . "%' and AirlineName not like '%" . $SearchString . "%' and CountryName like '%" . $SearchString . "%'))";
$AirlineList = $AirlineObject->SearchAirline($Query);
$Array = array('CardBody' => '', 'CardFooter' => '', 'Page' => '');
foreach ($AirlineList as $Airline) {
    $Array["CardBody"] .= '<tr data-countryid="' . $Airline["CountryID"] . '">
    <td>' . $Airline["AirlineID"] . '</td>
    <td>' . $Airline["AirlineName"] . '</td>
    <td>' . $Airline["CountryName"] . '</td>
    <td><img style="object-fit: contain;" style="" width="200" height=70" src="../icon/' . $Airline["AirlineImage"] . '"></td>
    <td><button id="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
    <td><button id="Edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></td>
</tr>';
}
die(json_encode($Array));
