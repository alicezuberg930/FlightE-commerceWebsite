<?php session_start();
$Order = ($_SESSION["Order"]);
$OrderID = $Order["OrderID"];
$TotalPrice = number_format($Order["TotalPrice"]) . " VND";
die(json_encode(array("OrderID" => $OrderID, "TotalPrice" => $TotalPrice)));
