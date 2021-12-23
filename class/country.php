<?php require_once("../../connection.php");
class country
{
    public function GetCountry()
    {
        $connect = connection();
        $arr = array();
        $query = mysqli_query($connect, "select * from country");
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
}
$CountryObject = new country();
