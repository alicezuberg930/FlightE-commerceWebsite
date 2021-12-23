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
    public function AddOrder($order)
    {
        $Connect = connection();
        $OrderID = $order["OrderID"];
        $StartFlight = $order["StartFlight"];
        $Quantity = $order["Quantity"];
        $TotalPrice = $order["TotalPrice"];
        $State  = $order["State"];
        $EmployeeID = $order["EmployeeID"];
        $OrderDate = $order["OrderDate"];
        $MemberID = $order["MemberID"];
        $ContactEmail = $order["ContactEmail"];
        $ContactName = $order["ContactName"];
        $Address = $order["Address"];
        $TotalWeight = $order["TotalWeight"];
        $StartDate = $order["StartDate"];
        $ReturnDate = $order["ReturnDate"];
        $query = mysqli_query($Connect, "INSERT INTO orders(OrderID,StartDate,ReturnDate,StartFlight,Quantity,TotalPrice,State,EmployeeID,OrderDate,MemberID,ContactEmail,ContactName,Address,TotalWeight) 
        VALUES('" . $OrderID . "','" . $StartDate . "',$ReturnDate,'" . $StartFlight . "','" . $Quantity . "','" . $TotalPrice . "','" . $State . "',$EmployeeID,'" . $OrderDate . "','" . $MemberID . "','" . $ContactEmail . "',
        '" . $ContactName . "','" . $Address . "','" . $TotalWeight . "')");
        $Connect->close();
        return $query;
    }
    public function AddOrderDetails($orderdetails)
    {
        $connect = connection();
        foreach ($orderdetails as $detail) {
            $OrderID = $detail["OrderID"];
            $TicketID = $detail["TicketID"];
            $PassengerName = $detail["PassengerName"];
            $Age = $detail["Age"];
            $TicketPrice = $detail["TicketPrice"];
            $BaggageID = $detail["BaggageID"];
            $SeatCode = $detail["SeatCode"];
            $Class = $detail["Class"];
            $Type = $detail["Type"];
            mysqli_query($connect, "UPDATE ticket SET State = 'Occupied' WHERE TicketID = '" . $TicketID . "'");
            $query = mysqli_query($connect, "INSERT INTO orderdetails(OrderID,TicketID,PassengerName,Age,TicketPrice,SeatCode,Class,Type,BaggageID) 
            VALUES('" . $OrderID . "','" . $TicketID . "','" . $PassengerName . "','" . $Age . "','" . $TicketPrice . "','" . $SeatCode . "',
            '" . $Class . "','" . $Type . "',$BaggageID)");
        }
        $connect->close();
        return $query;
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
