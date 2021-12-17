<?php require_once("../../class/statistic.php");
$MonthlyIncome = $OtatisticObject->GetTicketType();
$Array = array("Class" => [], "Ticket" => []);
foreach ($MonthlyIncome as $Month) {
    array_push($Array["Class"], $Month["Class"]);
    array_push($Array["Ticket"], $Month["Ticket"]);
}
die(json_encode($Array));
