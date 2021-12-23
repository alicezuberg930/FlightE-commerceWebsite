<?php require_once("../../class/plane.php");
$Start = ($_POST["p"] - 1) * 10;
$PlaneList = $PlaneObject->GetPlane($Start, 10);
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
$NumberOfPages = ceil(mysqli_num_rows(Query("select * from plane")) / 10);
for ($i = 1; $i <= $NumberOfPages; $i++) {
    $Array['CardFooter'] .= '<span>' . $i . '</span> ';
}
$Array['Page'] = $NumberOfPages;
die(json_encode($Array));
