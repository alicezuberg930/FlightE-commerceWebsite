<?php require_once("../../class/order.php");
session_start();
$OrderDetailHTML = '';
$i = 0;
$OrderDetailList = $OrderObject->GetOrderDetail($_POST["OrderID"]);
foreach ($OrderDetailList as $OrderDetail) {
    $OrderDetailHTML .= "<tr>
        <td>" . $i . "</td>
        <td>" . number_format($OrderDetail["PassengerName"]) . " VND</td>
        <td>" . $OrderDetail["Age"] . " kg</td>
        <td>" . $OrderDetail["Quantity"] . " người</td>
        <td>" . $OrderDetail["FlightID"] . "</td>
        <td></td>
    </tr>";
    $i++;
}
die($OrderDetailHTML);
