<?php require_once("../../class/order.php");
if ($OrderObject->DeleteOrderDetail($_POST["OrderID"]) == 1) {
    if ($OrderObject->DeleteOrder($_POST["OrderID"]) == 1) {
        die("Thành công");
    }
}
