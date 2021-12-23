<?php require_once("../../class/city.php");
$String = '';
$CityList = $CityObject->GetCity();
foreach ($CityList as $City) {
    $String .= '<option value="' . $City["CityID"] . '">' . $City["CityName"] . '</option>';
}
die($String);
