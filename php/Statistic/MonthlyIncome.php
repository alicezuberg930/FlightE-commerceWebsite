<?php require_once("../../class/statistic.php");
$MonthlyIncome = $OtatisticObject->GetMonthlyIncome($_POST["Date"]);
$Array = array("Date" => [], "Total" => []);
foreach ($MonthlyIncome as $Month) {
    $NewDate = explode("-", $Month["md"]);
    $Date = $NewDate[1] . "-" . $NewDate[0];
    array_push($Array["Date"], $Date);
    array_push($Array["Total"], $Month["total"]);
}
die(json_encode($Array));
