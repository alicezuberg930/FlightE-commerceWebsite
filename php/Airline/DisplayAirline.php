<?php require_once("../../class/airline.php");
$Start = ($_POST["p"] - 1) * 10;
$AirlineList = $AirlineObject->GetAirline($Start, 10);
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
$NumberOfPages = ceil(mysqli_num_rows(Query("select * from airline")) / 10);
for ($i = 1; $i <= $NumberOfPages; $i++) {
    $Array['CardFooter'] .= '<span>' . $i . '</span> ';
}
$Array['Page'] = $NumberOfPages;
die(json_encode($Array));
