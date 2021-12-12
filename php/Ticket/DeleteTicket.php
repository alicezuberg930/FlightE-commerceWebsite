<?php require_once("../../class/ticket.php");
$ID = $_POST["ID"];
if ($TicketObject->DeleteTicket($ID) == 1) {
    die("Đã xóa tất cả các vé của chuyến bay " . $ID);
} else {
    die("Có lỗi trong việc xóa tất cả các vé của chuyến bay " . $ID);
}
