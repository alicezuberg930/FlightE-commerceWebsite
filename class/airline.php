<?php require_once("../../connection.php");
class airline
{
    public function GetAirline($StartFrom, $Quantity)
    {
        $arr = array();
        $connect = connection();
        $query = mysqli_query($connect, "select * from airline a, country c where c.CountryID = a.CountryID order by AirlineID asc limit $StartFrom,$Quantity");
        while ($Row = mysqli_fetch_assoc($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
    public function AddAirline($Obj)
    {
        $connect = connection();
        $AirlineID = $Obj["AirlineID"];
        $AirlineName = $Obj["AirlineName"];
        $CountryID = $Obj["CountryID"];
        $AirlineImage = $Obj["AirlineImage"];
        $query = mysqli_query($connect, "insert into `airline`(`AirlineID`, `AirlineName`, `CountryID`, `AirlineImage`) 
        values('" . $AirlineID . "', '" . $AirlineName . "','" . $CountryID . "','" . $AirlineImage . "')");
        $connect->close();
        return $query;
    }
    public function DeleteAirline($ID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "delete from airline where AirlineID = '$ID'");
        $connect->close();
        return $query;
    }
    public function UpdateAirline($Obj)
    {
        $connect = connection();
        $HiddenAirlineID = $Obj["HiddenAirlineID"];
        $AirlineID = $Obj["AirlineID"];
        $AirlineName = $Obj["AirlineName"];
        $CountryID = $Obj["CountryID"];
        $AirlineImage = $Obj["AirlineImage"];
        if ($AirlineImage == '') {
            $query = mysqli_query($connect, "UPDATE `airline` SET `AirlineID`='" . $AirlineID . "',`AirlineName`='" . $AirlineName . "',`CountryID`='" . $CountryID . "' WHERE AirlineID = '" . $HiddenAirlineID . "'");
        } else {
            $query = mysqli_query($connect, "UPDATE `airline` SET `AirlineImage`='" . $AirlineImage . "' ,`AirlineID`='" . $AirlineID . "',`AirlineName`='" . $AirlineName . "',`CountryID`='" . $CountryID . "' WHERE AirlineID = '" . $HiddenAirlineID . "'");
        }
        $connect->close();
        return $query;
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
$AirlineObject = new airline();
