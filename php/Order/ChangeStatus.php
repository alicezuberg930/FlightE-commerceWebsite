<?php require_once("../../class/order.php");
if ($OrderObject->ChangeStatus($_POST["State"], $_POST["ID"]) == 1) {
    die("Thành công");
}
