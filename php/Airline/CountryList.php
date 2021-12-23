<?php require_once("../../class/country.php");
$String = '';
$CountryList = $CountryObject->GetCountry();
foreach ($CountryList as $Country) {
    $String .= '<option value="' . $Country["CountryID"] . '">' . $Country["CountryName"] . '</option>';
}
die($String);
