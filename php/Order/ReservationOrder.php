<?php require_once("../../class/order.php");
require_once("../../class/flight.php");
require_once("../../class/flightpath.php");
session_start();
$OrderInfo = $_POST["OrderDetails"];
$FlightID = $OrderInfo["StartFlight"];
$Quantity = count($OrderInfo["CustomerInfo"]);
$Flight = $FlightObject->SearchFlight(" and FlightID = '$FlightID'")[0];
$StartFlightPath = $FlightPathObject->GetFlightPath(" where PathID = '" . $Flight["PathID"] . "'")[0];
$StartFlightPathString = $StartFlightPath["CN1"] . " (" . $StartFlightPath["StartAirport"] . ") - " . $StartFlightPath["CN2"] . " (" . $StartFlightPath["EndAirport"] . ")";
$Flight2 = $ReturnDate = $EndFlightPathString = $EndFlightPath = 'null';
if (isset($OrderInfo["ReturnFlight"])) {
    $Flight2 = $FlightObject->SearchFlight(" and FlightID = '" . $OrderInfo["ReturnFlight"] . "'")[0];
    $EndFlightPath = $FlightPathObject->GetFlightPath(" where PathID = '" . $Flight2["PathID"] . "'")[0];
    $EndFlightPathString = $EndFlightPath["CN1"] . " (" . $EndFlightPath["StartAirport"] . ") - " . $EndFlightPath["CN2"] . " (" . $EndFlightPath["EndAirport"] . ")";
    $ReturnDate = $Flight2["StartDate"];
}
$PriceDetails = [];
$TotalPrice = $TotalWeight = 0;
foreach ($OrderInfo["CustomerInfo"] as $o) {
    $TotalWeight += $o["BaggageWeight"];
    $TotalPrice += $o["BaggagePrice"];
    if (!empty($ReturnFlight)) {
        if ($o["Age"] == 'Adult' && $o["Class"] == 'Economy') {
            $TotalPrice += $Flight2["AdultPrice"];
            $PriceDetails[] = $Flight2["AdultPrice"];
        }
        if ($o["Age"] == 'Adult' && $o["Class"] == 'Business') {
            $TotalPrice += $Flight2["AdultPrice"] * 2;
            $PriceDetails[] = $Flight2["AdultPrice"] * 2;
        }
        if ($o["Age"] == 'Children' && $o["Class"] == 'Economy') {
            $TotalPrice += $Flight2["ChildrenPrice"];
            $PriceDetails[] = $Flight2["ChildrenPrice"];
        }
        if ($o["Age"] == 'Children' && $o["Class"] == 'Business') {
            $TotalPrice += $Flight2["ChildrenPrice"] * 2;
            $PriceDetails[] = $Flight2["ChildrenPrice"] * 2;
        }
        if ($o["Age"] == 'Toddler' && $o["Class"] == 'Economy') {
            $TotalPrice += $Flight2["ToddlerPrice"];
            $PriceDetails[] = $Flight2["ToddlerPrice"];
        }
        if ($o["Age"] == 'Toddler' && $o["Class"] == 'Business') {
            $TotalPrice += $Flight2["ToddlerPrice"] * 2;
            $PriceDetails[] = $Flight2["ToddlerPrice"] * 2;
        }
    } else {
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
}
$OrderDate = date("Y-m-d");
$MemberID = $_SESSION["Member"][0]["MemberID"];
$ContactEmail = $OrderInfo["ContactEmail"];
$ContactName = $OrderInfo["ContactName"];
$Address = $OrderInfo["Address"];
$OrderArray = array(
    "StartDate" => $Flight["StartDate"], "ReturnDate" => $ReturnDate, 'StartFlight' => $StartFlightPathString, 'Quantity' => $Quantity, 'TotalPrice' => $TotalPrice, 'State' => "Chưa thanh toán",
    'EmployeeID' => 'null', 'OrderDate' => $OrderDate, 'MemberID' => $MemberID, 'ContactEmail' => $ContactEmail,
    'ContactName' => $ContactName, 'Address' => $Address, 'TotalWeight' => $TotalWeight, "ReturnFlight" => $EndFlightPathString
);
$i = $OrderCheck = $OrderDetailCheck = 0;
$Order = $OrderObject->addOrder($OrderArray);
if ($Order == 1) {
    $OrderCheck = 1;
}
$OrderID = mysqli_fetch_array(Query("select max(OrderID) as OrderID from orders"))[0];
$OrderDetailsArray = array();
foreach ($OrderInfo["CustomerInfo"] as $o) {
    $Bruh = array(
        "OrderID" => $OrderID, "TicketID" => $o['TicketID'], "PassengerName" => $o["PassengerName"],
        "Age" => $o["Age"], "TicketPrice" => $PriceDetails[$i], "BaggagePrice" => $o["BaggagePrice"],
        "BaggageWeight" => $o["BaggageWeight"], "SeatCode" => $o["SeatCode"], "Class" => $o["Class"], "Type" => $o["Type"]
    );
    $OrderDetailsArray[] = $Bruh;
    $i++;
}
$OrderDetail = $OrderObject->AddOrderDetails($OrderDetailsArray);
if ($OrderDetail == 1) {
    $OrderDetailCheck = 1;
}
die(json_encode(array("OrderCheck" => $OrderCheck, "OrderDetailCheck" => $OrderDetailCheck)));
