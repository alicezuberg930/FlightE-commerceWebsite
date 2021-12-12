<?php require_once("../../connection.php");
class baggage
{
    public function GetBaggage()
    {
        $arr = array();
        $query = mysqli_query($connect = connection(), "select * from baggage ");
        while ($Row = mysqli_fetch_array($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
}

$BaggageObject = new baggage();
