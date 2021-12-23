<?php require_once("../../class/order.php");
$OrderDetailHTML = $Age = '';
$OrderDetailList = $OrderObject->GetOrderDetail($_POST["OrderID"]);
foreach ($OrderDetailList as $OrderDetail) {
    if ($OrderDetail["Age"] == "Adult") {
        $Age = "Người lớn";
    } else if ($OrderDetail["Age"] == "Children") {
        $Age = "Trẻ em";
    } else {
        $Age  = "Em bé";
    }
    if ($OrderDetail["BaggageID"] != '') {
        $Weight =  $OrderDetail["Weight"];
    } else {
        $Weight = 0;
    }
    $OrderDetailHTML .= "<tr data-orderid='" . $OrderDetail["OrderID"] . "'>
        <td>" . $OrderDetail["OrderID"] . "</td>
        <td>" . $OrderDetail["TicketID"] . "</td>
        <td>" . $OrderDetail["PassengerName"] . "</td>
        <td>" . $Age . "</td>
        <td>" . number_format($OrderDetail["TicketPrice"]) . " VND</td>
        <td>" . number_format($OrderDetail["Price"]) . " VND</td>
        <td>" . $Weight . " Kg</td>
        <td>" . $OrderDetail["SeatCode"] . "</td>
        <td>" . $OrderDetail["Class"] . "</td>
        <td>" . $OrderDetail["Type"] . "</td>
    </tr>";
}
die($OrderDetailHTML);
