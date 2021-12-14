<?php require_once("../../class/order.php");
session_start();
$UserID = $OrderHTML  = '';
$i = 1;
if (isset($_SESSION["Member"]))
    $UserID = $_SESSION["Member"][0]["MemberID"];
if (isset($_SESSION["Employee"]))
    $UserID = $_SESSION["Employee"][0]["EmployeeID"];
$OrderList = $OrderObject->GetOrder(" where MemberID = '" . $UserID . "'");
foreach ($OrderList as $Order) {
    $OrderHTML .= "<tr data-id='" . $Order["OrderID"] . "'>
        <td>" . $i . "</td>
        <td>" . number_format($Order["TotalPrice"]) . " VND</td>
        <td>" . $Order["TotalWeight"] . " kg</td>
        <td>" . $Order["Quantity"] . " người</td>
        <td>" . $Order["FlightID"] . "</td>
        <td></td>
        <td><button id='cancel' class='btn bg-warning btn-sm'>Hủy Vé</button></td>
        <td><button id='detail' class='btn bg-info btn-sm'>Chi tiết</button></td>
    </tr>";
    $i++;
}
die($OrderHTML);
