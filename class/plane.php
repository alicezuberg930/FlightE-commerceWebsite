<?php require_once("../../connection.php");
class plane
{
    public function AddPlane($Obj)
    {
        $State = $Obj["State"];
        $SeatCode = $Obj["SeatCode"];
        $FlightID = $Obj["FlightID"];
        $Class = $Obj["Class"];
        $query = mysqli_query($connect = connection(), "insert into ticket(State,SeatCode,FlightID,Class) 
        values('$State','$SeatCode','$FlightID','$Class')");
        $connect->close();
        return $query;
    }
    public function DeletePlane($ID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "delete from ticket where FlightID = '$ID'");
        $connect->close();
        return $query;
    }
    public function EditPlane($ID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "delete from ticket where FlightID = '$ID'");
        $connect->close();
        return $query;
    }
    public function GetPlane($SQL)
    {
        $connect = connection();
        $arr = array();
        $query = mysqli_query($connect, "select * from plane " . $SQL);
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
}
$PlaneObject  = new plane();
