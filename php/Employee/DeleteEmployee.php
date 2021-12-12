<?php require_once("../../class/employee.php");
$Query = $EmployeeObject->DeleteEmployee($_POST["ID"]);
if ($Query == 1) {
    die("Xóa nhân viên thành công");
} else {
    die("Xóa nhân viên thất bại");
}
