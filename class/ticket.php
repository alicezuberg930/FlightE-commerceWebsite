<?php require_once("../../connection.php");
class ticket
{
    public function AddTicket($Obj)
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
    public function DeleteTicket($ID)
    {
        $query = mysqli_query($connect = connection(), "delete from ticket where FlightID = '$ID'");
        $connect->close();
        return $query;
    }
    public function GetTicket($SQL)
    {
        $arr = array();
        $query = mysqli_query($connect = connection(), "select * from ticket " . $SQL);
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
}
$TicketObject  = new ticket();
