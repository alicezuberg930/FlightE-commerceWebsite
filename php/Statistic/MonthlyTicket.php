<?php require_once("../../class/statistic.php");
$MonthlyIncome = $OtatisticObject->GetMonthlyTicket($_POST["Date"]);
$Array = array("Date" => [], "Ticket" => []);
foreach ($MonthlyIncome as $Month) {
    $NewDate = explode("-", $Month["md"]);
    $Date = $NewDate[1] . "-" . $NewDate[0];
    array_push($Array["Date"], $NewDate);
    array_push($Array["Ticket"], $Month["total"]);
}
die(json_encode($Array));
