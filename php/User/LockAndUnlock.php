<?php require_once("../../class/member.php");
if ($MemberObject->LockUnlock($_POST["ID"], $_POST["State"]) == 1) {
    die("Success");
} else {
    die("Failed");
}
