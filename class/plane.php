<?php require_once("../../connection.php");
class plane
{
    public function AddPlane($Obj)
    {
        $connect = connection();
        $PlaneID = $Obj["PlaneID"];
        $PlaneName = $Obj["PlaneName"];
        $Rows = $Obj["Rows"];
        $Columns = $Obj["Columns"];
        $BusinessRow = $Obj["BusinessRow"];
        $SeatAmount = $Obj["SeatAmount"];
        $query = mysqli_query($connect, "insert into `plane`(`PlaneID`, `PlaneName`, `SeatAmount`, `Rows`, `Columns`, `BusinessClassRow`) 
        values('" . $PlaneID . "', '" . $PlaneName . "','" . $SeatAmount . "','" . $Rows . "','" . $Columns . "','" . $BusinessRow . "')");
        $connect->close();
        return $query;
    }
    public function DeletePlane($ID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "delete from plane where PlaneID = '$ID'");
        $connect->close();
        return $query;
    }
    public function UpdatePlane($Obj)
    {
        $connect = connection();
        $PlaneID = $Obj["PlaneID"];
        $PlaneName = $Obj["PlaneName"];
        $Rows = $Obj["Rows"];
        $Columns = $Obj["Columns"];
        $BusinessRow = $Obj["BusinessRow"];
        $SeatAmount = $Obj["SeatAmount"];
        $HiddenPlaneID = $Obj["HiddenPlaneID"];
        $query = mysqli_query($connect, "UPDATE `plane` SET `PlaneID`='" . $PlaneID . "',`PlaneName`='" . $PlaneName . "',`SeatAmount`='" . $SeatAmount . "',
        `Rows`='" . $Rows . "',`Columns`='" . $Columns . "',`BusinessClassRow`='" . $BusinessRow . "' WHERE `PlaneID`='" . $HiddenPlaneID . "'");
        $connect->close();
        return $query;
    }
    public function SearchPlane($SQL)
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
    public function GetPlane($StartFrom, $Quantity)
    {
        $arr = array();
        $connect = connection();
        $query = mysqli_query($connect, "select * from plane order by PlaneID asc limit $StartFrom,$Quantity");
        while ($Row = mysqli_fetch_assoc($query)) {
            $arr[] = $Row;
        }
        $connect->close();
        return $arr;
    }
}
$PlaneObject  = new plane();
