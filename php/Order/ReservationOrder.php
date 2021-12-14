<?php require_once("../../class/order.php");
require_once("../../class/flight.php");
session_start();
$OrderInfo = $_POST["OrderDetails"];
$FlightID = $OrderInfo["StartFlight"];
$ReturnFlight = $OrderInfo["ReturnFlight"];
$Quantity = count($OrderInfo["CustomerInfo"]);
$Flight = $FlightObject->SearchFlight(" and FlightID = '$FlightID'")[0];
$PriceDetails = [];
$TotalPrice = $TotalWeight = 0;
foreach ($OrderInfo["CustomerInfo"] as $o) {
    $TotalWeight += $o["BaggageWeight"];
    $TotalPrice += $o["BaggagePrice"];
    if ($o["Age"] == 'Adult' && $o["Class"] == 'Economy') {
        $TotalPrice += $Flight["AdultPrice"];
        $PriceDetails[] = $Flight["AdultPrice"];
    }
    if ($o["Age"] == 'Adult' && $o["Class"] == 'Business') {
        $TotalPrice += $Flight["AdultPrice"] * 2;
        $PriceDetails[] = $Flight["AdultPrice"] * 2;
    }
    if ($o["Age"] == 'Children' && $o["Class"] == 'Economy') {
        $TotalPrice += $Flight["ChildrenPrice"];
        $PriceDetails[] = $Flight["ChildrenPrice"];
    }
    if ($o["Age"] == 'Children' && $o["Class"] == 'Business') {
        $TotalPrice += $Flight["ChildrenPrice"] * 2;
        $PriceDetails[] = $Flight["ChildrenPrice"] * 2;
    }
    if ($o["Age"] == 'Toddler' && $o["Class"] == 'Economy') {
        $TotalPrice += $Flight["ToddlerPrice"];
        $PriceDetails[] = $Flight["ToddlerPrice"];
    }
    if ($o["Age"] == 'Toddler' && $o["Class"] == 'Business') {
        $TotalPrice += $Flight["ToddlerPrice"] * 2;
        $PriceDetails[] = $Flight["ToddlerPrice"] * 2;
    }
}
$OrderDate = date("Y-m-d");
$MemberID = $_SESSION["Member"][0]["MemberID"];
$ContactEmail = $OrderInfo["ContactEmail"];
$ContactName = $OrderInfo["ContactName"];
$Address = $OrderInfo["Address"];
$OrderArray = array(
    'FlightID' => $FlightID, 'Quantity' => $Quantity, 'TotalPrice' => $TotalPrice, 'State' => 0,
    'EmployeeID' => 'null', 'OrderDate' => $OrderDate, 'MemberID' => $MemberID, 'ContactEmail' => $ContactEmail,
    'ContactName' => $ContactName, 'Address' => $Address, 'TotalWeight' => $TotalWeight
);
$i = $OrderCheck = $OrderDetailCheck = 0;
if ($OrderObject->addOrder($OrderArray) == 1) {
    $OrderCheck = 1;
}
$OrderID = mysqli_fetch_array(Query("select max(OrderID) as OrderID from orders"))[0];
$OrderDetailsArray = array();
foreach ($OrderInfo["CustomerInfo"] as $o) {
    $Bruh = array(
        "OrderID" => $OrderID, "TicketID" => $o['TicketID'], "PassengerName" => $o["PassengerName"],
        "Age" => $o["Age"], "TicketPrice" => $PriceDetails[$i], "BaggagePrice" => $o["BaggagePrice"],
        "BaggageWeight" => $o["BaggageWeight"], "SeatCode" => $o["SeatCode"], "Class" => $o["Class"]
    );
    $OrderDetailsArray[] = $Bruh;
    $i++;
}
if ($OrderObject->AddOrderDetails($OrderDetailsArray) == 1) {
    $OrderDetailCheck = 1;
}
die(json_encode(array("OrderCheck" => $OrderCheck, "OrderDetailCheck" => $OrderDetailCheck)));
