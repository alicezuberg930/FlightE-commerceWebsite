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
    public function Getmember($Position, $Start, $Quantity)
    {
        $connect = connection();
        $query = mysqli_query($connect, "SELECT * FROM member WHERE Position = '$Position' ORDER BY ID ASC LIMIT $Start, $Quantity");
        $memberArray = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $memberArray[] = $Row;
        }
        $connect->close();
        return $memberArray;
    }
    public function Editmember($ID, $Fullname, $Email, $Password, $Phonenumber, $Gender)
    {
        $connect = connection();
        $query = mysqli_query($connect, "UPDATE employee SET Fullname='$Fullname', Email='$Email', Password='$Password', 
        Phonenumber='$Phonenumber', Gender='$Gender' WHERE ID='$ID'");
        $connect->close();
        return $query;
    }
    public function Deletemember($ID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "DELETE FROM employee WHERE ID = '$ID'");
        $connect->close();
        return $query;
    }
}
$MemberObject = new member();