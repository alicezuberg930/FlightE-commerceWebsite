<?php require_once("../../class/order.php");
if (isset($_POST["OrderID"])) {
    setcookie("OrderID", $_POST["OrderID"]);
}
$OrderDetailHTML = $Age = '';
$OrderDetailList = $OrderObject->GetOrderDetail($_COOKIE["OrderID"]);
foreach ($OrderDetailList as $OrderDetail) {
    if ($OrderDetail["Age"] == "Adult") {
        $Age = "Người lớn";
    } else if ($OrderDetail["Age"] == "Children") {
        $Age = "Trẻ em";
    } else {
        $Age  = "Em bé";
    }
    $OrderDetailHTML .= "<tr>
        <td>" . $OrderDetail["OrderID"] . "</td>
        <td>" . $OrderDetail["TicketID"] . "</td>
        <td>" . $OrderDetail["PassengerName"] . "</td>
        <td>" . $Age . "</td>
        <td>" . number_format($OrderDetail["TicketPrice"]) . " VND</td>
        <td>" . number_format($OrderDetail["BaggagePrice"]) . " VND</td>
        <td>" . $OrderDetail["BaggageWeight"] . " Kg</td>
        <td>" . $OrderDetail["SeatCode"] . "</td>
        <td>" . $OrderDetail["Class"] . "</td>
        <td>" . $OrderDetail["Type"] . "</td>
    </tr>";
}
die($OrderDetailHTML);
