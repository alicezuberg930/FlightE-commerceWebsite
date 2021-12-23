<?php require_once("../../class/order.php");
$OrderHTML = $State = $ReturnDate = '';
$i = 1;
$Start = ($_POST["p"] - 1) * 5;
$Array = array("CardBody" => '', 'CardFooter' => '');
$OrderList = $OrderObject->GetOrder(" ORDER BY OrderID ASC LIMIT $Start, 5");
$States = [
    "Đã Thanh Toán",
    "Đang Chuyển",
    "Đã Giao"
];
foreach ($OrderList as $Order) {
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
        <td>" . $ReturnDate  . "</td>
        <td>
            <select id='state' class='form-control'>
                <option value='" . $Order["State"] . "' selected>" . $Order["State"] . "</option>
            " . $State . "
            </select>
        </td>
        <td>
            <p>Địa chỉ: " . $Order["ContactEmail"] . "</p>
            <p>Tên người đặt: " . $Order["ContactName"] . "</p>
            <p>Địa chỉ: " . $Order["Address"] . "</p>
        </td>
        <td><button id='deletebutton' class='btn bg-danger btn-sm'><i class='fas fa-trash-alt'></i></button></td>
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
<button class='excel-export btn bg-primary'>Xuất hóa đơn</button>";
die(json_encode($Array));
