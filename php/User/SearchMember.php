<?php require_once("../../class/member.php");
$SearchString = $_POST["SearchString"];
$Array = array('CardBody' => '', 'CardFooter' => '', 'Page' => '');
$Query = "select * from member where ((Fullname LIKE '%" . $SearchString . "%' and Email not like '%" . $SearchString . "%' and Phonenumber not like '%" . $SearchString . "%' and Gender not like '%" . $SearchString . "%') or
(Fullname not LIKE '%" . $SearchString . "%' and Email like '%" . $SearchString . "%' and Phonenumber not like '%" . $SearchString . "%' and Gender not like '%" . $SearchString . "%') or
(Fullname not LIKE '%" . $SearchString . "%' and Email not like '%" . $SearchString . "%' and Phonenumber like '%" . $SearchString . "%' and Gender not like '%" . $SearchString . "%') or
(Fullname not LIKE '%" . $SearchString . "%' and Email not like '%" . $SearchString . "%' and Phonenumber not like '%" . $SearchString . "%' and Gender like '%" . $SearchString . "%'))";
$MemberList = $MemberObject->SearchMember($Query);
$i = 1;
foreach ($MemberList as $Member) {
    if ($Member["State"] == 1) {
        $Lock = '<button id="Lock" class="btn btn-danger btn-sm"><i class="fas fa-lock"></i></button>';
    } else {
        $Lock = '<button id="Unlock" class="btn btn-danger btn-sm"><i class="fas fa-unlock"></i></button>';
    }
    $Array['CardBody'] .= '<tr data-id="' . $Member["MemberID"] . '">
        <td>' . $i . '</td>
        <td>' . $Member["Fullname"] . '</td>
        <td>' . $Member["Email"] . '</td>
        <td>' . $Member["Password"] . '</td>
        <td>' . $Member["Phonenumber"] . '</td>
        <td>' . $Member["Gender"] . '</td>
        <td>' . $Lock . '</td>
    </tr>';
    $i++;
}
die(json_encode($Array));