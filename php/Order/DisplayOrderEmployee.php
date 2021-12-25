<?php require_once("../../class/order.php");
$OrderHTML = $State = $Style = $ReturnDate = '';
$i = 1;
if (isset($_POST["p"])) {
    $Start = ($_POST["p"] - 1) * 5;
    $OrderList = $OrderObject->GetOrder(" ORDER BY StartDate desc LIMIT $Start, 5");
} else if (isset($_POST["MemberID"])) {
    $Style = "style='display:none;'";
    $OrderList = $OrderObject->GetOrder(" where MemberID = '" . $_POST["MemberID"] . "'");
}
$Array = array("CardBody" => '', 'CardFooter' => '');
$States = [
    "Đã thanh toán",
    "Đang chuyển",
    "Đã giao"
];
foreach ($OrderList as $Order) {
    if ($Order["State"] == 'Đã giao') {
        $Disabled = "disabled='disabled'";
    } else {
        $Disabled = '';
    }
    $State .= "<option selected value='" . $Order["State"] . "'>" . $Order["State"] . "</option>";
    foreach ($States as $s) {
        if ($Order["State"] == $s)
            continue;
        else
            $State .= "<option value='" . $s . "'>" . $s . "</option>";
    }
    if (!empty($Order["ReturnDate"])) {
        $ReturnDate = date("d-m-Y", strtotime($Order["ReturnDate"]));
    } else {
        $ReturnDate = '';
    }
    $Array["CardBody"] .= "<tr data-id='" . $Order["OrderID"] . "'>
        <td>" . $i . "</td>
        <td>" . date("d-m-Y", strtotime($Order["OrderDate"]))  . "</td>
        <td>" . number_format($Order["TotalPrice"]) . " VND</td>
        <td>" . $Order["TotalWeight"] . " kg</td>
        <td>" . $Order["Quantity"] . " người</td>
        <td>" . $Order["StartFlight"] . "</td>
        <td>" . date("d-m-Y", strtotime($Order["StartDate"]))  . "</td>
        <td>" . $Order["ReturnFlight"] . "</td>
        <td>" . $ReturnDate  . "</td>";
    if (isset($_POST["MemberID"])) {
        $Array["CardBody"] .= "<td>" . $Order["State"] . "</td>";
    } else {
        $Array["CardBody"] .= "<td>
            <select " . $Disabled . " id='state' class='form-control'>'" . $State . "'</select>
        </td>";
    }
    $Array["CardBody"] .= "<td>
            <p>Email: " . $Order["ContactEmail"] . "</p>
            <p>Tên người đặt: " . $Order["ContactName"] . "</p>
            <p>Địa chỉ: " . $Order["Address"] . "</p>
        </td>
        <td " . $Style . "><button id='deletebutton' class='btn bg-danger btn-sm'><i class='fas fa-trash-alt'></i></button></td>
        <td><button id='detail' class='btn bg-info btn-sm'><i class='fas fa-info-circle'></i></button></td>
    </tr>";
    $i++;
    $State = '';
}
$Array['CardFooter'] .= "<div class='page-list'>";
$NumberOfPages = intval(ceil(mysqli_num_rows(Query("select * from orders")) / 5));
for ($i = 1; $i <= $NumberOfPages; $i++) {
    $Array['CardFooter'] .= '<span>' . $i . '</span> ';
}
$Array['CardFooter'] .= "</div>
<button id='export-orders' class='btn bg-primary'>Xuất hóa đơn</button>";
die(json_encode($Array));
