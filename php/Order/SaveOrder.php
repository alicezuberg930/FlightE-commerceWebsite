<?php require_once("../../class/order.php");
require_once("../../class/payment.php");
session_start();
if (mysqli_num_rows(Query("select * from payments where OrderID = '" . $_SESSION["Order"]["OrderID"] . "'")) == 1) {
    die();
}
$_SESSION["Order"]["OrderDate"] = $_SESSION["Payment"]["PaymentTime"];
if ($OrderObject->AddOrder($_SESSION["Order"]) == 1) {
    if ($PaymenObject->AddPayment($_SESSION["Payment"]) == 1) {
        if ($OrderObject->AddOrderDetails($_SESSION["OrderDetail"]) == 1) {
            die(1);
        } else {
            die(0);
        }
    } else {
        die(0);
    }
} else {
    die(0);
}
