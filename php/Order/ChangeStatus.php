<?php require_once("../../class/order.php");
session_start();
if ($OrderObject->ChangeStatus($_POST["State"], $_POST["ID"], $_SESSION["Employee"][0]["EmployeeID"]) == 1) {
    die("Thành công");
}
