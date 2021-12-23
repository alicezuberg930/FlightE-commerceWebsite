<?php require_once("../../connection.php");
class flight
{
    public function AirPlanes($SQL)
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
    public function Airlines()
    {
        $connect = connection();
        $arr = array();
        $query = mysqli_query($connect, "select * from airline");
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
    public function CitiesAndAirports($StartAirport)
    {
        $connect = connection();
        $arr = array();
        $query = mysqli_query($connect, "select * from city c, airport a where c.CityID = a.CityID and a.AirportID != '$StartAirport'");
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
    public function AddFlight($Obj)
    {
        $connect = connection();
        $StartDate = $Obj["StartDate"];
        $StartTime = $Obj["StartTime"];
        $EndTime = $Obj["EndTime"];
        $PlaneID = $Obj["PlaneID"];
        $AirlineID = $Obj["AirlineID"];
        $PathID = $Obj["PathID"];
        $EndDate = $Obj["EndDate"];
        $AdultPrice = $Obj["AdultPrice"];
        $ChildrenPrice = $Obj["ChildrenPrice"];
        $ToddlerPrice = $Obj["ToddlerPrice"];
        $query = mysqli_query($connect, "insert into flight(StartDate,StartTime,EndTime,PlaneID,AirlineID,PathID,EndDate,AdultPrice,ChildrenPrice,ToddlerPrice) 
        VALUES('$StartDate','$StartTime','$EndTime','$PlaneID','$AirlineID','$PathID','$EndDate','$AdultPrice','$ChildrenPrice','$ToddlerPrice')");
        $connect->close();
        return $query;
    }
    public function UpdateFlight($Obj)
    {
        $connect = connection();
        $ID = $Obj["FlightID"];
        $StartDate = $Obj["StartDate"];
        $StartTime = $Obj["StartTime"];
        $EndTime = $Obj["EndTime"];
        // $PlaneID = $Obj["PlaneID"];
        $AirlineID = $Obj["AirlineID"];
        $PathID = $Obj["PathID"];
        $EndDate = $Obj["EndDate"];
        $AdultPrice = $Obj["AdultPrice"];
        $ChildrenPrice = $Obj["ChildrenPrice"];
        $ToddlerPrice = $Obj["ToddlerPrice"];
        $query = mysqli_query($connect, "update flight set StartDate='$StartDate', StartTime='$StartTime', EndTime='$EndTime',
        AirlineID='$AirlineID', PathID='$PathID', EndDate='$EndDate', AdultPrice='$AdultPrice', ChildrenPrice='$ChildrenPrice', 
        ToddlerPrice='$ToddlerPrice' where FlightID = '" . $ID . "'");
        $connect->close();
        return $query;
    }
    public function DeleteFlight($FlightID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "delete from flight where FlightID = '$FlightID'");
        $connect->close();
        return $query;
    }
    public function GetFlight($StartFrom, $Quantity)
    {
        $arr = array();
        $connect = connection();
        $query = mysqli_query($connect, "select * from flight f, plane p, airline a, flightpath fp where f.PlaneID = p.PlaneID 
        and f.AirlineID = a.AirlineID and fp.PathID = f.PathID order by FlightID asc limit $StartFrom,$Quantity");
        while ($Row = mysqli_fetch_assoc($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
    public function SearchFlight($SQL)
    {
        $connect = connection();
        $arr = array();
        $query = mysqli_query($connect, "select * from flight f, plane p, airline a, flightpath fp where f.PlaneID = p.PlaneID 
        and f.AirlineID = a.AirlineID and fp.PathID = f.PathID" . $SQL);
        while ($Row = mysqli_fetch_assoc($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
}
$FlightObject = new flight();
