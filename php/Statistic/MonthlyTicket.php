<?php require_once("../../class/statistic.php");
$MonthlyIncome = $OtatisticObject->GetMonthlyTicket();
$Array = array("Date" => [], "Ticket" => []);
foreach ($MonthlyIncome as $Month) {
    array_push($Array["Date"], $Month["md"]);
    array_push($Array["Ticket"], $Month["total"]);
}
die(json_encode($Array));
