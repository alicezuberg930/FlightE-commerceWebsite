<?php require_once("../../class/flight.php");
$Array = array('CountryArray' => '', 'CityAirportArray' => '');
$Array["CountryArray"] = $FlightObject->Countries();
$Array["CityAirportArray"] = $FlightObject->CitiesAndAirports($_POST["Airport"]);
die(json_encode($Array));
