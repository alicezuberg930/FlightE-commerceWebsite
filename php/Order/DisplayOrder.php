<?php require_once("../../class/order.php");
session_start();
if (isset($_SESSION["Payment"]) && isset($_SESSION["Order"]) && isset($_SESSION["OrderDetail"])) {
    unset($_SESSION["Payment"]);
    unset($_SESSION["Order"]);
    unset($_SESSION["OrderDetail"]);
}
$UserID = $OrderHTML = $ReturnDate  = '';
$i = 1;
if (isset($_SESSION["Member"]))
    $UserID = $_SESSION["Member"][0]["MemberID"];
$OrderList = $OrderObject->GetOrder(" where MemberID = '" . $UserID . "' order by OrderDate desc");
foreach ($OrderList as $Order) {
    if (!empty($Order["ReturnDate"])) {
        $ReturnDate = date("d-m-Y", strtotime($Order["ReturnDate"]));
    } else {
        $ReturnDate = '';
    }
    $OrderHTML .= "<tr data-id='" . $Order["OrderID"] . "'>
        <td>" . $i . "</td>
        <td>" . date("d-m-Y", strtotime($Order["OrderDate"]))  . "</td>
        <td>" . number_format($Order["TotalPrice"]) . " VND</td>
        <td>" . $Order["TotalWeight"] . " kg</td>
        <td>" . $Order["Quantity"] . " người</td>
        <td>" . $Order["StartFlight"] . "</td>
        <td>" . date("d-m-Y", strtotime($Order["StartDate"]))  . "</td>
        <td>" . $Order["ReturnFlight"] . "</td>
        <td>" . $ReturnDate  . "</td>
        <td>" . $Order["State"] . "</td>
        <td><button id='cancel' class='btn bg-danger btn-sm'><i class='fas fa-trash-alt'></i></button></td>
        <td><button id='detail' class='btn bg-info btn-sm'><i class='fas fa-info-circle'></i></button></td>
    </tr>";
    $i++;
}
die($OrderHTML);
