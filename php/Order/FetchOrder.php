<?php require_once("../../class/order.php");
require_once("../../class/flight.php");
$OrderList = $OrderObject->GetOrder('');
$Total = 0;
$Array = array("Header" => array_keys($OrderList[0]), "Row" => []);
$TempArray = array();
foreach ($OrderList as $Order) {
    $Total += $Order["TotalPrice"];
    $TempArray[] = [
        $Order["OrderID"],
        $Order["StartFlight"],
        $Order["Quantity"],
        number_format($Order["TotalPrice"]) . " VND",
        $Order["State"],
        $Order["EmployeeID"],
        $Order["OrderDate"],
        $Order["MemberID"],
        $Order["ContactEmail"],
        $Order["ContactName"],
        $Order["Address"],
        $Order["TotalWeight"] . " kg",
        $Order["ReturnFlight"],
        $Order["StartDate"],
        $Order["ReturnDate"]
    ];
}
$TempArray[] = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', "Tổng thành tiền: " . number_format($Total) . " VND"];
$Array["Row"] = $TempArray;
die(json_encode($Array));
