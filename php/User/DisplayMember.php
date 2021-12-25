<?php require_once("../../class/member.php");
$Array = array('CardBody' => '', 'CardFooter' => '', 'Page' => '');
$i = 1;
$Start = ($_POST["p"] - 1) * 10;
$MemberList = $MemberObject->GetMember($Start, 10);
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
        <td><button id="history" class="btn btn-info"><i class="fas fa-history"></i></button></td>
        <td>' . $Lock . '</td>
    </tr>';
    $i++;
}
$NumberOfPages = intval(ceil(mysqli_num_rows(Query("select * from member")) / 5));
for ($i = 1; $i <= $NumberOfPages; $i++) {
    $Array['CardFooter'] .= '<span>' . $i . '</span> ';
}
die(json_encode($Array));
