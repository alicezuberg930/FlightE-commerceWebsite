<?php require_once("../../connection.php");
class order
{
    public function getAllOrder($cusID)
    {
        $query = mysqli_query(connection(), "SELECT * FROM orders WHERE CustomerID = '$cusID'");
        $OrderArray = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $OrderArray[] = $Row;
        }
        connection()->close();
        return $OrderArray;
    }
    public function getOrderDetail($orderid)
    {
        $query = mysqli_query(connection(), "SELECT * FROM orderdetail, vegetable WHERE orderdetail.OrderID = '$orderid'
        AND orderdetail.VegetableID = vegetable.VegetableID");
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
        $FlightID = $order["FlightID"];
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
        $query = mysqli_query($Connect, "INSERT INTO orders(FlightID,Quantity,TotalPrice,State,EmployeeID,OrderDate,MemberID,ContactEmail,ContactName,Address,TotalWeight) 
        VALUES('" . $FlightID . "','" . $Quantity . "','" . $TotalPrice . "','" . $State . "',$EmployeeID,'" . $OrderDate . "','" . $MemberID . "','" . $ContactEmail . "',
        '" . $ContactName . "','" . $Address . "','" . $TotalWeight . "')");
        $Connect->close();
        return $query;
    }
    public function AddOrderDetails($orderdetails)
    {
        foreach ($orderdetails as $detail) {
            $OrderID = $detail["OrderID"];
            $TicketID = $detail["TicketID"];
            $PassengerName = $detail["PassengerName"];
            $Age = $detail["Age"];
            $TicketPrice = $detail["TicketPrice"];
            $BaggagePrice = $detail["BaggagePrice"];
            $BaggageWeight = $detail["BaggageWeight"];
            $SeatCode = $detail["SeatCode"];
            $Class = $detail["Class"];
            mysqli_query(connection(), "UPDATE ticket SET State = 'Occupied' WHERE TicketID = '" . $TicketID . "'");
            $query = mysqli_query(connection(), "INSERT INTO orderdetails(OrderID,TicketID,PassengerName,Age,TicketPrice,BaggagePrice,BaggageWeight,SeatCode,Class) 
            VALUES('" . $OrderID . "','" . $TicketID . "','" . $PassengerName . "','" . $Age . "','" . $TicketPrice . "','" . $BaggagePrice . "','" . $BaggageWeight . "',
            '" . $SeatCode . "','" . $Class . "')");
        }
        return $query;
    }
}

$OrderObject = new order();
