<?php require_once("../../class/member.php");
$Array = array('Response' => '', 'Phonenumber' => '', "Email" => '');
$Member = $_POST["UserInfo"];
$username = $Member["username"];
$email = $Member["email"];
$password = $Member["password"];
$phonenumber = $Member["phonenumber"];
$gender = $Member["gender"];
$Query =  $MemberObject->Register($username, $email, $password, $phonenumber, $gender);
$CheckEmail = mysqli_num_rows(Query("select * from Member where Email = '$email'"));
$CheckPhonenumber = mysqli_num_rows(Query("select * from Member where Phonenumber = '$phonenumber'"));
if ($CheckEmail > 0) {
    $Array["Email"] = "Email đã tồn tại";
}
if ($CheckPhonenumber > 0) {
    $Array["Phonenumber"] = "Số điện thoại đã tồn tại";
}
if ($Query == 1) {
    $Array["Response"] = "Success";
} else {
    $Array["Response"] = "Error";
}
die(json_encode($Array));
