
<?php require_once("../../connection.php");
class city
{
    public function GetCity()
    {
        $connect = connection();
        $arr = array();
        $query = mysqli_query($connect, "select * from city");
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
}
$CityObject = new city();
