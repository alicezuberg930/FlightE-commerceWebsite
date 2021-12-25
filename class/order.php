<?php require_once("../../connection.php");
class order
{
    public function DeleteOrder($ID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "delete from orders where OrderID = '" . $ID . "'");
        $connect->close();
        return $query;
    }
    public function DeleteOrderDetail($ID)
    {
        $TicketArray = array();
        $connect = connection();
        $query = mysqli_query($connect, "select TicketID from orderdetails where OrderID = '" . $ID . "'");
        while ($row = mysqli_fetch_assoc($query)) {
            $TicketArray[] = $row;
        }
        foreach ($TicketArray as $Ticket) {
            mysqli_query($connect, "update ticket set State = 'Empty' where TicketID = '" . $Ticket["TicketID"] . "'");
        }
        $query = mysqli_query($connect, "delete from orderdetails where OrderID = '" . $ID . "'");
        $connect->close();
        return $query;
    }
    public function GetOrder($SQL)
    {
        $connect = connection();
        $query = mysqli_query($connect, "SELECT * FROM orders" . $SQL);
        $OrderArray = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $OrderArray[] = $Row;
        }
        $connect->close();
        return $OrderArray;
    }
    public function GetOrderDetail($ID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "SELECT * FROM orderdetails o left join baggage b on o.BaggageID =  b.BaggageID where o.OrderID = '" . $ID . "'");
        $DetailArray = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $DetailArray[] = $Row;
        }
        connection()->close();
        return $DetailArray;
    }
    public function ChangeStatus($State, $ID, $EmployeeID)
    {
        $connect  = connection();
        $query = mysqli_query($connect, "update orders set EmployeeID = '" . $EmployeeID . "' , State = '" . $State . "' where OrderID = '" . $ID . "'");
        $connect->close();
        return $query;
    }
}

$OrderObject = new order();
