<?php require_once("../../class/statistic.php");
$MonthlyIncome = $OtatisticObject->GetMonthlyOrder();
$Array = array("Date" => [], "Order" => []);
foreach ($MonthlyIncome as $Month) {
    array_push($Array["Date"], $Month["md"]);
    array_push($Array["Order"], $Month["total"]);
}
die(json_encode($Array));
