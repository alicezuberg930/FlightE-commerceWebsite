<?php require_once("../../connection.php");
class member
{
    public function Login($Email, $Table)
    {
        $connect = connection();
        $query = mysqli_query($connect, "SELECT * FROM $Table WHERE Email = '" . $Email . "'");
        $CustomerArray = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $CustomerArray[] = $Row;
        }
        $connect->close();
        return $CustomerArray;
    }
    public function Register($Fullname, $Email, $Password, $Phonenumber, $Gender)
    {
        $connect = connection();
        $query = mysqli_query($connect, "INSERT INTO member(FullName,Email,Password,Phonenumber,Gender) 
        VALUES('$Fullname','$Email','$Password','$Phonenumber','$Gender')");
        $connect->close();
        return $query;
    }
    public function GetMember($Start, $Quantity)
    {
        $connect = connection();
        $query = mysqli_query($connect, "SELECT * FROM member ORDER BY MemberID ASC LIMIT $Start, $Quantity");
        $memberArray = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $memberArray[] = $Row;
        }
        $connect->close();
        return $memberArray;
    }
    public function SearchMember($SQL)
    {
        $connect = connection();
        $query = mysqli_query($connect, $SQL);
        $array = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $array[] = $Row;
        }
        $connect->close();
        return $array;
    }
    public function UpdateMember($User, $Table, $IDType)
    {
        $ID = $User["ID"];
        $Fullname = $User["Fullname"];
        $Email = $User["Email"];
        $Phonenumber = $User["Phonenumber"];
        $Gender = $User["Gender"];
        $connect = connection();
        $query = mysqli_query($connect, "UPDATE $Table SET Fullname='$Fullname', Email='$Email', 
        Phonenumber='$Phonenumber', Gender='$Gender' WHERE $IDType='$ID'");
        $connect->close();
        return $query;
    }
    public function ChangePassword($User, $Table, $IDType)
    {
        $ID = $User["ID"];
        $Password = $User["Password"];
        $connect = connection();
        $query = mysqli_query($connect, "UPDATE $Table SET Password = '$Password' WHERE $IDType='$ID'");
        $connect->close();
        return $query;
    }
    public function DeleteMember($ID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "DELETE FROM member WHERE MemberID = '$ID'");
        $connect->close();
        return $query;
    }
    public function LockUnlock($ID, $State)
    {
        $connect = connection();
        $query = mysqli_query($connect, "update member set State = '" . $State . "' WHERE MemberID = '" . $ID . "' ");
        $connect->close();
        return $query;
    }
    public function GetSpecificMember($ID, $Table, $IDType)
    {
        $connect = connection();
        $query = mysqli_query($connect, "SELECT * FROM $Table WHERE $IDType='$ID'");
        $Array = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $Array[] = $Row;
        }
        $connect->close();
        return $Array;
    }
}
$MemberObject = new member();
