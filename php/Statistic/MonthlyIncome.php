<?php require_once("../../class/statistic.php");
$MonthlyIncome = $OtatisticObject->GetMonthlyIncome();
$Array = array("Date" => [], "Total" => []);
foreach ($MonthlyIncome as $Month) {
    array_push($Array["Date"], $Month["md"]);
    array_push($Array["Total"], $Month["total"]);
}
die(json_encode($Array));
