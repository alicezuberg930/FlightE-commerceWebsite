<?php require_once("../../connection.php");
class employee
{
    public function GetEmployee($Start, $Quantity)
    {
        $query = mysqli_query($connect = connection(), "SELECT * FROM employee ORDER BY EmployeeID ASC LIMIT $Start, $Quantity");
        $UserArray = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $UserArray[] = $Row;
        }
        $connect->close();
        return $UserArray;
    }
    public function AddEmployee($Fullname, $Email, $Password, $Phonenumber, $Gender)
    {
        $query = mysqli_query($connect = connection(), "INSERT INTO employee(Fullname,Email,Password,Phonenumber,Gender) VALUES('$Fullname','$Email','$Password','$Phonenumber','$Gender')");
        $connect->close();
        return $query;
    }
    public function DeleteEmployee($ID)
    {
        $query = mysqli_query($connect = connection(), "DELETE FROM employee WHERE EmployeeID = '$ID'");
        $connect->close();
        return $query;
    }
    public function UpdateEmployee($ID, $Fullname, $Email, $Password, $Phonenumber, $Gender)
    {
        $query = mysqli_query($connect = connection(), "UPDATE employee SET Fullname='$Fullname', Email='$Email', Password='$Password', 
        Phonenumber='$Phonenumber', Gender='$Gender' WHERE EmployeeID='$ID'");
        $connect->close();
        return $query;
    }
}

$EmployeeObject = new employee();
