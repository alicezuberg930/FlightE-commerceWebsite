<?php require_once("../../class/employee.php");
$SearchString = $_POST["SearchString"];
$Array = array('CardBody' => '', 'CardFooter' => '', 'Page' => '');
$Query = " ((Fullname LIKE '%" . $SearchString . "%' and Email not like '%" . $SearchString . "%' and Phonenumber not like '%" . $SearchString . "%' and Gender not like '%" . $SearchString . "%') or
(Fullname not LIKE '%" . $SearchString . "%' and Email like '%" . $SearchString . "%' and Phonenumber not like '%" . $SearchString . "%' and Gender not like '%" . $SearchString . "%') or
(Fullname not LIKE '%" . $SearchString . "%' and Email not like '%" . $SearchString . "%' and Phonenumber like '%" . $SearchString . "%' and Gender not like '%" . $SearchString . "%') or
(Fullname not LIKE '%" . $SearchString . "%' and Email not like '%" . $SearchString . "%' and Phonenumber not like '%" . $SearchString . "%' and Gender like '%" . $SearchString . "%'))";
$EmployeeList = $EmployeeObject->SearchEmployee($Query);
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
die(json_encode($Array));
