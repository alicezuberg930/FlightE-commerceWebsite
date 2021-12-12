<?php require_once("../../connection.php");
class flight
{
    public function AirPlanes($SQL)
    {
        $arr = array();
        $query = mysqli_query($connect = connection(), "select * from plane " . $SQL);
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
    public function Airlines()
    {
        $arr = array();
        $query = mysqli_query($connect = connection(), "select * from airline");
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
    public function Countries()
    {
        $arr = array();
        $query = mysqli_query($connect = connection(), "select * from country order by CountryName desc");
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
    public function CitiesAndAirports($StartAirport)
    {
        $arr = array();
        $query = mysqli_query($connect = connection(), "select * from city c, airport a where c.CityID = a.CityID and a.AirportID != '$StartAirport'");
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
    public function AddFlight($Obj)
    {
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
        $query = mysqli_query($connect = connection(), "insert into flight(StartDate,StartTime,EndTime,PlaneID,AirlineID,PathID,EndDate,AdultPrice,ChildrenPrice,ToddlerPrice) 
        VALUES('$StartDate','$StartTime','$EndTime','$PlaneID','$AirlineID','$PathID','$EndDate','$AdultPrice','$ChildrenPrice','$ToddlerPrice')");
        $connect->close();
        return $query;
    }
    public function EditFlight($Obj)
    {
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
        $query = mysqli_query($connect = connection(), "update flight set StartDate='$StartDate', StartTime='$StartTime', EndTime='$EndTime',
        PlaneID='$PlaneID', AirlineID='$AirlineID', PathID='$PathID', EndDate='$EndDate', AdultPrice 
        AdultPrice='$AdultPrice', ChildrenPrice='$ChildrenPrice', ToddlerPrice='$ToddlerPrice'");
        $connect->close();
        return $query;
    }
    public function DeleteFlight($FlightID)
    {
        $query = mysqli_query($connect = connection(), "delete from flight where FlightID = '$FlightID'");
        $connect->close();
        return $query;
    }
    public function GetFlight($StartFrom, $Quantity)
    {
        $arr = array();
        $query = mysqli_query($connect = connection(), "select * from flight f, plane p, airline a, flightpath fp where f.PlaneID = p.PlaneID 
        and f.AirlineID = a.AirlineID and fp.PathID = f.PathID order by FlightID asc limit $StartFrom,$Quantity");
        while ($Row = mysqli_fetch_assoc($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
    public function SearchFlight($SQL)
    {
        $arr = array();
        $query = mysqli_query($connect = connection(), "select * from flight f, plane p, airline a, flightpath fp where f.PlaneID = p.PlaneID 
        and f.AirlineID = a.AirlineID and fp.PathID = f.PathID" . $SQL);
        while ($Row = mysqli_fetch_assoc($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
}
$FlightObject = new flight();
