<?php require_once("../../class/flight.php");
require_once("../../class/flightpath.php");
$Flight = $FlightObject->SearchFlight(" and FlightID = '" . $_POST["FlightID"] . "'")[0];
$Flightpath = $FlightPathObject->GetFlightPath(' where PathID = "' . $Flight["PathID"] . '"')[0];
$String = '<tr>
<td>' . $Flightpath["CN1"] . '</td>
<td>' . $Flightpath["CN2"] . '</td>
<td>' . $Flightpath["AN1"] . '</td>
<td>' . $Flightpath["AN2"] . '</td>
<td>' . date("H:i", strtotime($Flight["EndTime"])) . '</td>
<td>' . date("d-m-Y", strtotime($Flight["EndDate"])) . '</td>
<td>' . date("H", strtotime($Flightpath["Time"])) . 'giờ ' . date("i", strtotime($Flightpath["Time"])) . 'phút</td>
</tr>';
die($String);
