<?php require_once("../../class/flight.php");
require_once("../../class/country.php");
$Array = array('CountryArray' => '', 'CityAirportArray' => '');
$Array["CountryArray"] = $CountryObject->GetCountry();
$Array["CityAirportArray"] = $FlightObject->CitiesAndAirports($_POST["Airport"]);
die(json_encode($Array));
