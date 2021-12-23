<?php require_once("../../class/flightpath.php");
require_once("../../class/flight.php");
require_once("../../class/plane.php");
$Array = array('AirplaneArray' => '', 'AirlineArray' => '', 'FlightpathArray' => '');
$Array["AirplaneArray"] = $PlaneObject->SearchPlane('');
$Array["AirlineArray"] =  $FlightObject->Airlines();
$Array["FlightpathArray"] =  $FlightPathObject->GetFlightPath("");
die(json_encode($Array));
