<?php require_once("../../connection.php");
class flightpath
{
    public function GetFlightPath($SearchString)
    {
        $arr = array();
        $query = mysqli_query(
            $connect = connection(),
            "select fp.*, a1.AirportName AN1, a2.AirportName AN2, c1.CityName CN1, c2.CityName CN2, cc1.CountryName CCN1, cc2.CountryName CCN2
            from flightpath fp join airport a1 join city c1 join country cc1 on fp.StartAirport = a1.AirportID and c1.CityID = a1.CityID 
            and cc1.CountryID = c1.CountryID join airport a2 join city c2 join country cc2 on fp.EndAirport = a2.AirportID 
            and a2.CityID = c2.CityID and cc2.CountryID = c2.CountryID" . $SearchString
        );
        while ($Row = mysqli_fetch_assoc($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
}
$FlightPathObject = new flightpath();
