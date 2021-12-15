<?php require_once("../../connection.php");
class ticket
{
    public function AddTicket($Obj)
    {
        $connect = connection();
        $State = $Obj["State"];
        $SeatCode = $Obj["SeatCode"];
        $FlightID = $Obj["FlightID"];
        $Class = $Obj["Class"];
        $query = mysqli_query($connect, "insert into ticket(State,SeatCode,FlightID,Class) 
        values('$State','$SeatCode','$FlightID','$Class')");
        $connect->close();
        return $query;
    }
    public function DeleteTicket($ID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "delete from ticket where FlightID = '$ID'");
        $connect->close();
        return $query;
    }
    public function GetTicket($SQL)
    {
        $connect = connection();
        $arr = array();
        $query = mysqli_query($connect, "select * from ticket " . $SQL);
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
}
$TicketObject  = new ticket();


// for ($row = 1; $row <= 32; $row++) {
//     $letter = "A";
//     if ($row <= 4) {
//         $Class = 'Business';
//     } else {
//         $Class =  'Economy';
//     }
//     for ($column = 0; $column < 6; $column++) {
//         $Array = array("State" => 'Empty', "SeatCode" => $row . $letter, "FlightID" => 1, "Class" => $Class);
//         // $Array["SeatCode"] = $row . $letter;
//         $TicketObject->AddTicket($Array);
//         $letter++;
//     }
// }
