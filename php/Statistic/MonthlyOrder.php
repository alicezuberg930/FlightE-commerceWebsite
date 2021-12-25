<?php require_once("../../class/statistic.php");
$MonthlyIncome = $OtatisticObject->GetMonthlyOrder($_POST["Date"]);
$Array = array("Date" => [], "Order" => []);
foreach ($MonthlyIncome as $Month) {
    $NewDate = explode("-", $Month["md"]);
    $Date = $NewDate[1] . "-" . $NewDate[0];
    array_push($Array["Date"], $Date);
    array_push($Array["Order"], $Month["total"]);
}
die(json_encode($Array));
