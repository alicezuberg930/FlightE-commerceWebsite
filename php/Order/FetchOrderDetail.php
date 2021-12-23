<?php require_once("../../class/order.php");
require_once("../../class/flight.php");
$OrderList = $OrderObject->GetOrder(' where OrderID="' . $_POST["OrderID"] . '"');
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
$TempArray[] = [''];
$TempArray[] = ['', '', '', '', 'Chi tiết hóa đơn'];
$OrderDetailList = $OrderObject->GetOrderDetail($_POST["OrderID"]);
$TempArray[] = array_keys($OrderDetailList[0]);
foreach ($OrderDetailList as $OrderDetail) {
    $TempArray[] = [
        $OrderDetail["OrderID"],
        $OrderDetail["TicketID"],
        $OrderDetail["PassengerName"],
        $OrderDetail["Age"],
        number_format($OrderDetail["TicketPrice"]) . " VND",
        number_format($OrderDetail["BaggagePrice"]) . " VND",
        $OrderDetail["BaggageWeight"] . " kg",
        $OrderDetail["SeatCode"],
        $OrderDetail["Class"],
        $OrderDetail["Type"],
    ];
}
$TempArray[] = ["Tổng thành tiền: " . number_format($Total) . " VND"];
$Array["Row"] = $TempArray;
die(json_encode($Array));
