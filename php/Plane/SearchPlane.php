<?php require_once("../../class/plane.php");
$SearchString = $_POST["SearchString"];
$Query = "where ((PlaneID LIKE '%" . $SearchString . "%' and PlaneName not like '%" . $SearchString . "%' and SeatAmount not like '%" . $SearchString . "%') or
(PlaneID not LIKE '%" . $SearchString . "%' and PlaneName like '%" . $SearchString . "%' and SeatAmount not like '%" . $SearchString . "%') or
(PlaneID not LIKE '%" . $SearchString . "%' and PlaneName not like '%" . $SearchString . "%' and SeatAmount like '%" . $SearchString . "%'))";
$PlaneList = $PlaneObject->SearchPlane($Query);
$Array = array('CardBody' => '', 'CardFooter' => '', 'Page' => '');
foreach ($PlaneList as $Plane) {
    $Array["CardBody"] .= '<tr>
    <td>' . $Plane["PlaneID"] . '</td>
    <td>' . $Plane["PlaneName"] . '</td>
    <td>' . $Plane["SeatAmount"] . '</td>
    <td>' . $Plane["Rows"] . '</td>
    <td>' . $Plane["Columns"] . '</td>
    <td>' . $Plane["BusinessClassRow"] . '</td>
    <td><button id="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
    <td><button id="Edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></td>
</tr>';
}
die(json_encode($Array));
