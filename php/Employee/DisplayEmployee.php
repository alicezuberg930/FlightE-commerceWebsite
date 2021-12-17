<?php require_once("../../class/employee.php");
$Array = array('CardBody' => '', 'CardFooter' => '');
$Start = ($_POST["p"] - 1) * 5;
$EmployeeList = $EmployeeObject->GetEmployee($Start, 5);
foreach ($EmployeeList as $Employee) {
    $Array['CardBody'] .= '<tr>
        <td>' . $Employee["EmployeeID"] . '</td>
        <td>' . $Employee["Fullname"] . '</td>
        <td>' . $Employee["Email"] . '</td>
        <td>' . $Employee["Password"] . '</td>
        <td>' . $Employee["Phonenumber"] . '</td>
        <td>' . $Employee["Gender"] . '</td>
        <td><button id="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
        <td><button id="Edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></td>
    </tr>';
}
$NumberOfPages = intval(ceil(mysqli_num_rows(Query("select * from employee")) / 5));
for ($i = 1; $i <= $NumberOfPages; $i++) {
    $Array['CardFooter'] .= '<span>' . $i . '</span> ';
}
die(json_encode($Array));
