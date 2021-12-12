<?php require_once("../../connection.php");
class member
{
    public function Login($Email, $Table)
    {
        $query = mysqli_query(connection(), "SELECT * FROM $Table WHERE Email = '" . $Email . "'");
        $CustomerArray = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $CustomerArray[] = $Row;
        }
        connection()->close();
        return $CustomerArray;
    }
    public function Register($Fullname, $Email, $Password, $Phonenumber, $Gender)
    {
        $query = mysqli_query(connection(), "INSERT INTO member(FullName,Email,Password,Phonenumber,Gender) 
        VALUES('$Fullname','$Email','$Password','$Phonenumber','$Gender')");
        connection()->close();
        return $query;
    }
    public function Getmember($Position, $Start, $Quantity)
    {
        $query = mysqli_query(connection(), "SELECT * FROM member WHERE Position = '$Position' ORDER BY ID ASC LIMIT $Start, $Quantity");
        $memberArray = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $memberArray[] = $Row;
        }
        connection()->close();
        return $memberArray;
    }
    public function Editmember($ID, $Fullname, $Email, $Password, $Phonenumber, $Gender)
    {
        $query = mysqli_query(connection(), "UPDATE employee SET Fullname='$Fullname', Email='$Email', Password='$Password', 
        Phonenumber='$Phonenumber', Gender='$Gender' WHERE ID='$ID'");
        connection()->close();
        return $query;
    }
    public function Deletemember($ID)
    {
        $query = mysqli_query(connection(), "DELETE FROM employee WHERE ID = '$ID'");
        connection()->close();
        return $query;
    }
}
$MemberObject = new member();
