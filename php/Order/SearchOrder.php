<?php require_once("../../class/order.php");
$OrderHTML = $State = $ReturnDate = '';
$i = 1;
$Array = array("CardBody" => '', 'CardFooter' => '');
$SearchString = str_replace([' ', 'VND', ','], '', $_POST["SearchString"]);
$Query = " where ((OrderDate LIKE '%" . $SearchString . "%' and TotalPrice not like '%" . $SearchString . "%' and StartFlight not like '%" . $SearchString . "%' and ReturnFlight not like '%" . $SearchString . "%' and ContactEmail not like '%" . $SearchString . "%' and ContactName not like '%" . $SearchString . "%' and Address not like '%" . $SearchString . "%') or
(OrderDate not LIKE '%" . $SearchString . "%' and TotalPrice like '%" . $SearchString . "%' and StartFlight not like '%" . $SearchString . "%' and ReturnFlight not like '%" . $SearchString . "%' and ContactEmail not like '%" . $SearchString . "%' and ContactName not like '%" . $SearchString . "%' and Address not like '%" . $SearchString . "%') or
(OrderDate not LIKE '%" . $SearchString . "%' and TotalPrice not like '%" . $SearchString . "%' and StartFlight like '%" . $SearchString . "%' and ReturnFlight not like '%" . $SearchString . "%' and ContactEmail not like '%" . $SearchString . "%' and ContactName not like '%" . $SearchString . "%' and Address not like '%" . $SearchString . "%') or
(OrderDate not LIKE '%" . $SearchString . "%' and TotalPrice not like '%" . $SearchString . "%' and StartFlight not like '%" . $SearchString . "%' and ReturnFlight like '%" . $SearchString . "%' and ContactEmail not like '%" . $SearchString . "%' and ContactName not like '%" . $SearchString . "%' and Address not like '%" . $SearchString . "%') or
(OrderDate not LIKE '%" . $SearchString . "%' and TotalPrice not like '%" . $SearchString . "%' and StartFlight not like '%" . $SearchString . "%' and ReturnFlight not like '%" . $SearchString . "%' and ContactEmail like '%" . $SearchString . "%' and ContactName not like '%" . $SearchString . "%' and Address not like '%" . $SearchString . "%') or
(OrderDate not LIKE '%" . $SearchString . "%' and TotalPrice not like '%" . $SearchString . "%' and StartFlight not like '%" . $SearchString . "%' and ReturnFlight not like '%" . $SearchString . "%' and ContactEmail not like '%" . $SearchString . "%' and ContactName like '%" . $SearchString . "%' and Address not like '%" . $SearchString . "%') or
(OrderDate not LIKE '%" . $SearchString . "%' and TotalPrice not like '%" . $SearchString . "%' and StartFlight not like '%" . $SearchString . "%' and ReturnFlight not like '%" . $SearchString . "%' and ContactEmail not like '%" . $SearchString . "%' and ContactName not like '%" . $SearchString . "%' and Address like '%" . $SearchString . "%'))";
$OrderList = $OrderObject->GetOrder($Query);
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
        <td>" . $ReturnDate  . "</td>
        <td>
            <select " . $Disabled . " id='state' class='form-control'>'" . $State . "'</select>
        </td>
        <td>
            <p>Email: " . $Order["ContactEmail"] . "</p>
            <p>Tên người đặt: " . $Order["ContactName"] . "</p>
            <p>Địa chỉ: " . $Order["Address"] . "</p>
        </td>
        <td><button id='deletebutton' class='btn bg-danger btn-sm'><i class='fas fa-trash-alt'></i></button></td>
        <td><button id='detail' class='btn bg-info btn-sm'><i class='fas fa-info-circle'></i></button></td>
    </tr>";
    $i++;
    $State = '';
}
$Array['CardFooter'] = "<button id='export-orders' class='btn bg-primary'>Xuất hóa đơn</button>";
die(json_encode($Array));
