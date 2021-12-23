<?php require_once("../../connection.php");
class airport
{
    public function GetAirport($Start, $Quantity)
    {
        $query = mysqli_query($connect = connection(), "SELECT * FROM airport a, city c, country ctr where a.CityID = c.CityID and 
        c.CountryID = ctr.CountryID LIMIT $Start, $Quantity");
        $arr = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
    public function AddAirport($Obj)
    {
        $connect = connection();
        $AirportID = $Obj["AirportID"];
        $AirportName = $Obj["AirportName"];
        $CityID = $Obj["CityID"];
        $Length = $Obj["Length"];
        $query = mysqli_query($connect, "INSERT INTO `airport`(`AirportID`, `AirportName`, `CityID`, `Length`) VALUES ('" . $AirportID . "',
        '" . $AirportName . "','" . $CityID . "','" . $Length . "')");
        $connect->close();
        return $query;
    }
    public function DeleteAirport($ID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "delete from airport where AirportID = '$ID'");
        $connect->close();
        return $query;
    }
    public function UpdateAirport($Obj)
    {
        $connect = connection();
        $AirportID = $Obj["AirportID"];
        $AirportName = $Obj["AirportName"];
        $CityID = $Obj["CityID"];
        $Length = $Obj["Length"];
        $HiddenAirportID = $Obj["HiddenAirportID"];
        $query = mysqli_query($connect, "UPDATE `airport` SET `AirportID`='" . $AirportID . "',`AirportName`='" . $AirportName . "',`CityID`='" . $CityID . "',`Length`='" . $Length . "' 
        WHERE AirportID = '" . $HiddenAirportID . "'");
        $connect->close();
        return $query;
    }
}

$AirportObject = new airport();
